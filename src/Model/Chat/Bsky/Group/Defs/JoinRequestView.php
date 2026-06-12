<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs;

/**
 * A join request from the perspective of the group owner.
 * object
 */
class JoinRequestView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'joinRequestView';
    public const ID = 'chat.bsky.group.defs';

    public string $convoId;
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $requestedBy;
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
        return ['convoId', 'requestedBy', 'requestedAt'];
    }

    public static function new(
        string $convoId,
        \DateTimeInterface $requestedAt,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $requestedBy = null,
    ): self {
        $instance = new self();
        $instance->convoId = $convoId;
        $instance->requestedAt = $requestedAt;
        if ($requestedBy !== null) {
            $instance->requestedBy = $requestedBy;
        }

        return $instance;
    }
}
