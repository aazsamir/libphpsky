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

    public string $code;
    public string $name;
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $owner;
    public int $memberCount;
    public int $memberLimit;
    public bool $requireApproval;
    public string $joinRule;
    public ?string $enabledStatus;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView Present only if the request is authenticated and the user is a member of the group. */
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo;
    public ?JoinLinkViewerState $viewer;

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
        return ['code', 'name', 'owner', 'memberCount', 'memberLimit', 'requireApproval', 'joinRule', 'enabledStatus'];
    }

    public static function new(
        string $code,
        string $name,
        int $memberCount,
        int $memberLimit,
        bool $requireApproval,
        string $joinRule,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $owner = null,
        ?string $enabledStatus = null,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoView $convo = null,
        ?JoinLinkViewerState $viewer = null,
    ): self {
        $instance = new self();
        $instance->code = $code;
        $instance->name = $name;
        $instance->memberCount = $memberCount;
        $instance->memberLimit = $memberLimit;
        $instance->requireApproval = $requireApproval;
        $instance->joinRule = $joinRule;
        if ($owner !== null) {
            $instance->owner = $owner;
        }
        if ($enabledStatus !== null) {
            $instance->enabledStatus = $enabledStatus;
        }
        if ($convo !== null) {
            $instance->convo = $convo;
        }
        if ($viewer !== null) {
            $instance->viewer = $viewer;
        }

        return $instance;
    }
}
