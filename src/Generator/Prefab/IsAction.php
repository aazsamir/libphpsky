<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Prefab;

use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * @internal
 */
trait IsAction
{
    private ATProtoClientInterface $client;
    private ?string $token = null;
    private ?string $endpoint = 'https://bsky.social/xrpc/';

    /**
     * @param array<string, mixed> $args
     */
    private function performRequest(?array $args, string $method): mixed
    {
        $body = null;

        if (isset($args['input'])) {
            $body = $args['input'];

            if (\is_object($body) && method_exists($body, 'toArray')) {
                $body = json_encode($body->toArray());
            } else {
                $body = json_encode($body);
            }

            if ($body === false) {
                throw new \RuntimeException('Failed to encode input as JSON.');
            }
        }

        unset($args['input']);
        $query = [];

        if ($args) {
            foreach ($args as $key => $value) {
                if ($value !== null) {
                    $query[$key] = $value;
                }
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
        $body = json_decode((string) $response->getBody(), true);

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

    private function client(): ATProtoClientInterface
    {
        return $this->client;
    }

    public function withClient(ATProtoClientInterface $client): self
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
