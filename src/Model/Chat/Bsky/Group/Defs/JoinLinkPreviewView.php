<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs;

/**
 * object
 */
class JoinLinkPreviewView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'joinLinkPreviewView';
    public const ID = 'chat.bsky.group.defs';

    public string $name;
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $owner;
    public int $memberCount;
    public bool $requireApproval;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView Present only if the request is authenticated and the user is a member of the group. */
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo;

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
        return ['name', 'owner', 'memberCount', 'requireApproval'];
    }

    public static function new(
        string $name,
        int $memberCount,
        bool $requireApproval,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $owner = null,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->memberCount = $memberCount;
        $instance->requireApproval = $requireApproval;
        if ($owner !== null) {
            $instance->owner = $owner;
        }
        if ($convo !== null) {
            $instance->convo = $convo;
        }

        return $instance;
    }
}
