<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\SubscribeModEvents;

/**
 * Fired when a user exceeds a rate limit.
 * object
 */
class EventRateLimitExceeded implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'eventRateLimitExceeded';
    public const ID = 'chat.bsky.moderation.subscribeModEvents';

    /** @var string The DID of the user who hit the rate limit. */
    public string $actorDid;
    public \DateTimeInterface $createdAt;

    /** @var string The NSID of the endpoint that was rate limited. */
    public string $endpoint;
    public string $rev;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['actorDid', 'createdAt', 'endpoint', 'rev'];
    }

    public static function new(string $actorDid, \DateTimeInterface $createdAt, string $endpoint, string $rev): self
    {
        $instance = new self();
        $instance->actorDid = $actorDid;
        $instance->createdAt = $createdAt;
        $instance->endpoint = $endpoint;
        $instance->rev = $rev;

        return $instance;
    }
}
