<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Prefab;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;

trait IsQuery
{
    use IsAction;

    public function __construct(ATProtoClientInterface $client, ?string $accessToken = null)
    {
        $this->client = $client;
        $this->token = $accessToken;
    }

    public static function default(?string $accessToken = null): self
    {
        return new self(ATProtoClientBuilder::getDefault(), $accessToken);
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
