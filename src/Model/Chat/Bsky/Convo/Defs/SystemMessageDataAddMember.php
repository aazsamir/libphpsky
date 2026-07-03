<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * System message indicating a user was added to the group convo.
 * object
 */
class SystemMessageDataAddMember implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'systemMessageDataAddMember';
    public const ID = 'chat.bsky.convo.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageReferredUser Current view of the member who was added. */
    public ?SystemMessageReferredUser $member;

    /** @var ?string Role the user was added to the group with. The role from 'member' will reflect the current data, not historical. */
    public ?string $role;
    public ?SystemMessageReferredUser $addedBy;

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
        return ['member', 'role', 'addedBy'];
    }

    public static function new(
        ?SystemMessageReferredUser $member = null,
        ?string $role = null,
        ?SystemMessageReferredUser $addedBy = null,
    ): self {
        $instance = new self();
        if ($member !== null) {
            $instance->member = $member;
        }
        if ($role !== null) {
            $instance->role = $role;
        }
        if ($addedBy !== null) {
            $instance->addedBy = $addedBy;
        }

        return $instance;
    }
}
