<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Prefab;

use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactory;
use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactoryInterface;
use Aazsamir\Libphpsky\Subscription\MessageDecoder;
use Aazsamir\Libphpsky\Subscription\Subscription;

/**
 * @internal
 */
trait IsSubscription
{
    // TODO: this trait doesn't belong here, need to move important parts out of it
    use IsAction;

    public function __construct(
        private WebSocketClientFactoryInterface $wssClientFactory,
        TypeResolver $typeResolver,
        ?string $accessToken = null,
    ) {
        $this->typeResolver = $typeResolver;
        $this->token = $accessToken;
    }

    public static function default(
        ?WebSocketClientFactoryInterface $wssClientFactory = null,
        ?TypeResolver $typeResolver = null,
        ?string $accessToken = null,
    ): self {
        return new self(
            $wssClientFactory ?? new WebSocketClientFactory(),
            $typeResolver ?? TypeResolver::getDefault(),
            $accessToken,
        );
    }

    /**
     * @param array<string, mixed> $args
     */
    public function createSubscription(array $args = []): Subscription
    {
        return new Subscription(
            $this->wssClientFactory,
            new MessageDecoder(
                $this->typeResolver,
            ),
            $this->endpoint,
            self::id(),
            $args,
            $this->headers,
            $this->token,
            $this->tokenType,
        );
    }

    /**
     * @param mixed[] $args
     *
     * @return array<string, mixed>
     */
    private function argsWithKeys(array $args): array
    {
        return $this->getArgsWithKeys($args, 'subscription');
    }
}
