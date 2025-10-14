<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Prefab;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;

/**
 * @internal
 */
trait IsQuery
{
    use IsAction;

    public function __construct(ATProtoClientInterface $client, TypeResolver $typeResolver, ?string $accessToken = null)
    {
        $this->client = $client;
        $this->typeResolver = $typeResolver;
        $this->token = $accessToken;
    }

    public static function default(
        ?ATProtoClientInterface $client = null,
        ?TypeResolver $typeResolver = null,
        ?string $accessToken = null,
    ): self {
        return new self(
            $client ?? ATProtoClientBuilder::getDefault(),
            $typeResolver ?? TypeResolver::default(),
            $accessToken,
        );
    }

    /**
     * @param array<string, mixed> $args
     */
    public function request(?array $args): mixed
    {
        return $this->performRequest($args, 'GET');
    }

    /**
     * @param mixed[] $args
     *
     * @return array<string, mixed>
     */
    private function argsWithKeys(array $args): array
    {
        return $this->getArgsWithKeys($args, 'query');
    }
}
