<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client\Facade;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Client\ATProtoException;
use Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle;
use Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DescribeRepo\DescribeRepo;
use GuzzleHttp\Psr7\Request;

readonly class ATProtoFacade
{
    public function __construct(
        private ATProtoClientInterface $client,
    ) {}

    public static function default(
        ?ATProtoClientInterface $client = null,
    ): self {
        return new self(
            client: $client ?? ATProtoClientBuilder::getDefault(),
        );
    }

    public function getPdsByHandle(string $handle): string
    {
        $did = ResolveHandle::default($this->client)->query($handle);

        return $this->getPdsByDid($did->did);
    }

    public function getPdsByDid(string $did): string
    {
        $repo = DescribeRepo::default($this->client)->query($did);

        if (!isset($repo->didDoc) || !\is_array($repo->didDoc)) {
            throw new FacadeException("Invalid DID document for '$did'.");
        }

        $services = $repo->didDoc['service'] ?? null;

        if (!\is_array($services)) {
            throw new FacadeException("Invalid DID document for '$did'.");
        }

        foreach ($services as $service) {
            if (!\is_array($service)) {
                continue;
            }

            $id = $service['id'] ?? null;

            if (!\is_string($id)) {
                continue;
            }

            if ($id !== '#atproto_pds') {
                continue;
            }

            $serviceEndpoint = $service['serviceEndpoint'] ?? null;

            if (!\is_string($serviceEndpoint)) {
                throw new FacadeException("Invalid PDS endpoint for '$did'.");
            }

            return $serviceEndpoint;
        }

        throw new FacadeException("PDS not found for '$did'.");
    }

    public function getAuthServerByHandle(string $handle): string
    {
        $did = ResolveHandle::default($this->client)->query($handle);

        return $this->getAuthServerByDid($did->did);
    }

    public function getAuthServerByDid(string $did): string
    {
        $pdsEndpoint = $this->getPdsByDid($did);

        return $this->getAuthServerByPds($pdsEndpoint);
    }

    public function getAuthServerByPds(string $pdsEndpoint): string
    {
        $authServerEndpoint = rtrim($pdsEndpoint, '/') . '/.well-known/oauth-protected-resource';
        $response = $this->doRequest($authServerEndpoint);

        if (!isset($response['authorization_servers']) || !\is_array($response['authorization_servers']) || \count($response['authorization_servers']) === 0) {
            throw new FacadeException("Authorization server not found in response from PDS '$pdsEndpoint'.");
        }

        $authServers = $response['authorization_servers'];
        $authServerEndpoint = $authServers[0];

        if (!\is_string($authServerEndpoint)) {
            throw new FacadeException("Invalid authorization server endpoint from PDS '$pdsEndpoint'.");
        }

        return $authServerEndpoint;
    }

    public function getAuthServerMetadata(string $authServerEndpoint): AuthServerMetadata
    {
        $request = new Request(
            method: 'GET',
            uri: rtrim($authServerEndpoint, '/') . '/.well-known/oauth-authorization-server',
        );

        $body = $this->doRequest((string) $request->getUri());

        return AuthServerMetadata::fromArray($body);
    }

    /**
     * @return array<mixed, mixed>
     */
    private function doRequest(
        string $uri,
        string $method = 'GET',
    ): array {
        $request = new Request(
            method: $method,
            uri: $uri,
        );

        try {
            $response = $this->client->sendRequest($request);

            if ($response->getStatusCode() !== 200) {
                throw new RequestException("Request to '$uri' failed with status code {$response->getStatusCode()}.", $response);
            }
        } catch (ATProtoException|RequestException $e) {
            $response = $e->getResponse();

            if ($response === null) {
                throw new FacadeException("Request to '$uri' failed: " . $e->getMessage(), previous: $e);
            }

            throw new RequestException("Request to '$uri' failed: " . $e->getMessage(), $response, $e);
        }

        $body = (string) $response->getBody();
        $body = json_decode($body, true);

        if (!\is_array($body)) {
            throw new FacadeException("Invalid response from '$uri'.");
        }

        return $body;
    }
}
