<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here].
 * object
 */
class GroupConvo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'groupConvo';
    public const ID = 'chat.bsky.convo.defs';

    /** @var string The display name of the group conversation. */
    public string $name;

    /** @var int The total number of members in the group conversation. */
    public int $memberCount;
    public \DateTimeInterface $createdAt;

    /** @var ?int The total number of pending join requests for the group conversation. Only present for the owner. Capped at 21. */
    public ?int $joinRequestCount;
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkView $joinLink;

    /** @var int The maximum number of members allowed in the group conversation. */
    public int $memberLimit;

    /** @var ?string The lock status of the conversation. */
    public ?string $lockStatus;

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
        return ['name', 'lockStatus', 'memberCount', 'memberLimit', 'createdAt'];
    }

    public static function new(
        string $name,
        int $memberCount,
        \DateTimeInterface $createdAt,
        int $memberLimit,
        ?int $joinRequestCount = null,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkView $joinLink = null,
        ?string $lockStatus = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->memberCount = $memberCount;
        $instance->createdAt = $createdAt;
        $instance->memberLimit = $memberLimit;
        if ($joinRequestCount !== null) {
            $instance->joinRequestCount = $joinRequestCount;
        }
        if ($joinLink !== null) {
            $instance->joinLink = $joinLink;
        }
        if ($lockStatus !== null) {
            $instance->lockStatus = $lockStatus;
        }

        return $instance;
    }
}
