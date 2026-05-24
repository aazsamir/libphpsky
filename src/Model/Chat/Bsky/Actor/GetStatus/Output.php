<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\GetStatus;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.actor.getStatus';

    /** @var bool True when the viewer's account is disabled and cannot actively participate in chat. */
    public bool $chatDisabled;

    /** @var bool Whether the viewer's account is allowed to create group chats. New accounts are restricted from creating groups. */
    public bool $canCreateGroups;

    /** @var int The maximum number of members allowed in a group conversation. */
    public int $groupMemberLimit;

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
        return ['chatDisabled', 'canCreateGroups', 'groupMemberLimit'];
    }

    public static function new(bool $chatDisabled, bool $canCreateGroups, int $groupMemberLimit): self
    {
        $instance = new self();
        $instance->chatDisabled = $chatDisabled;
        $instance->canCreateGroups = $canCreateGroups;
        $instance->groupMemberLimit = $groupMemberLimit;

        return $instance;
    }
}
