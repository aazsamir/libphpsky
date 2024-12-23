<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Prefab;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;

trait IsAction
{
    private ClientInterface $client;
    private ?string $token = null;
    private ?string $endpoint = 'https://bsky.social/xrpc/';

    /**
     * @param array<string, mixed> $args
     */
    private function performRequest(?array $args, string $function, string $method): mixed
    {
        $body = null;

        if (isset($args['input'])) {
            $body = $args['input'];
            $body = json_encode($body);

            if ($body === false) {
                throw new \RuntimeException('Failed to encode input as JSON.');
            }
        }

        unset($args['input']);
        $query = [];

        if ($args) {
            foreach ($args as $key => $value) {
                $query[$key] = $value;
            }
        }

        $request = new Request(
            method: $method,
            uri: $this->endpoint . self::id(),
            body: $body,
        );

        $request = $request->withHeader('Content-Type', 'application/json');

        if ($query) {
            $query = http_build_query($query);

            $request = $request->withUri(
                $request->getUri()->withQuery($query)
            );
        }

        if ($this->token) {
            $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        }

        $response = $this->client()->sendRequest($request);
        $body = json_decode($response->getBody()->getContents(), true);

        if ($response->getStatusCode() >= 400) {
            $error = 'undefined';
            $message = $response->getReasonPhrase();

            if (\is_array($body)) {
                if (isset($body['error']) && \is_string($body['error'])) {
                    $error = $body['error'];
                }
                if (isset($body['message']) && \is_string($body['message'])) {
                    $message = $body['message'];
                }
            }

            throw new QueryException($error, $message, $response->getStatusCode());
        }

        if ($body === null) {
            return (string) $response->getBody();
        }

        return $body;
    }

    abstract public static function id(): string;

    /**
     * @param mixed[] $args
     *
     * @return array<string, mixed>
     */
    private function getArgsWithKeys(array $args, string $method): array
    {
        $reflection = new \ReflectionMethod(self::class, $method);

        if (\count($args) < $reflection->getNumberOfRequiredParameters()) {
            throw new \RuntimeException('Something went wrong! We had less than the required number of parameters.');
        }

        foreach ($reflection->getParameters() as $param) {
            if (isset($args[$param->getPosition()])) {
                $args[$param->getName()] = $args[$param->getPosition()];
                unset($args[$param->getPosition()]);
            } elseif ($param->isOptional()) {
                $args[$param->getName()] = $param->getDefaultValue();
            }
        }

        /** @var array<string, mixed> $args */
        return $args;
    }

    private function client(): ClientInterface
    {
        if (!isset($this->client)) {
            $this->client = new Client();
        }

        return $this->client;
    }

    public function withClient(ClientInterface $client): self
    {
        $self = clone $this;
        $self->client = $client;

        return $self;
    }

    public function withAuth(string $token): self
    {
        $self = clone $this;
        $self->token = $token;

        return $self;
    }
}
