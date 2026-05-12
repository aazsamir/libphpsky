<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. System message indicating a user joined the group convo via join link.
 * object
 */
class SystemMessageDataMemberJoin implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'systemMessageDataMemberJoin';
    public const ID = 'chat.bsky.convo.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageReferredUser Current view of the member who joined. */
    public ?SystemMessageReferredUser $member;

    /** @var ?string Role the user was added to the group with. The role from 'member' will reflect the current data, not historical. */
    public ?string $role;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageReferredUser If join link was configured to require approval, this will be set to who approved the request. Undefined if approval was not required. */
    public ?SystemMessageReferredUser $approvedBy;

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
        return ['member', 'role'];
    }

    public static function new(
        ?SystemMessageReferredUser $member = null,
        ?string $role = null,
        ?SystemMessageReferredUser $approvedBy = null,
    ): self {
        $instance = new self();
        if ($member !== null) {
            $instance->member = $member;
        }
        if ($role !== null) {
            $instance->role = $role;
        }
        if ($approvedBy !== null) {
            $instance->approvedBy = $approvedBy;
        }

        return $instance;
    }
}
