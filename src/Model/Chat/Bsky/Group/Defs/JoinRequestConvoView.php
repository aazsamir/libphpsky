<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs;

/**
 * A join request from the perspective of the requester, including enough group context to render the request in a list (e.g. group name, owner, member count).
 * object
 */
class JoinRequestConvoView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'joinRequestConvoView';
    public const ID = 'chat.bsky.group.defs';

    public string $convoId;
    public string $name;
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $owner;
    public int $memberCount;
    public int $memberLimit;
    public \DateTimeInterface $requestedAt;

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
        return ['convoId', 'name', 'owner', 'memberCount', 'memberLimit', 'requestedAt'];
    }

    public static function new(
        string $convoId,
        string $name,
        int $memberCount,
        int $memberLimit,
        \DateTimeInterface $requestedAt,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $owner = null,
    ): self {
        $instance = new self();
        $instance->convoId = $convoId;
        $instance->name = $name;
        $instance->memberCount = $memberCount;
        $instance->memberLimit = $memberLimit;
        $instance->requestedAt = $requestedAt;
        if ($owner !== null) {
            $instance->owner = $owner;
        }

        return $instance;
    }
}
