<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. A current group convo member.
 * object
 */
class GroupConvoMember implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'groupConvoMember';
    public const ID = 'chat.bsky.actor.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic Who added this member. Only present if the member was added (instead of joining via link). */
    public ?ProfileViewBasic $addedBy;

    /** @var ?string The member's role within this conversation. Only present in group conversation member lists. */
    public ?string $role;

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
        return ['role'];
    }

    public static function new(?ProfileViewBasic $addedBy = null, ?string $role = null): self
    {
        $instance = new self();
        if ($addedBy !== null) {
            $instance->addedBy = $addedBy;
        }
        if ($role !== null) {
            $instance->role = $role;
        }

        return $instance;
    }
}
