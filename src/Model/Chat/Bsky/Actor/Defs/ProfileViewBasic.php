<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileViewBasic implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'profileViewBasic';
    public const ID = 'chat.bsky.actor.defs';

    public string $did;
    public string $handle;
    public ?string $displayName;
    public ?string $avatar;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileAssociated $associated;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ViewerState $viewer;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?bool $chatDisabled;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $did,
        string $handle,
        ?string $displayName = null,
        ?string $avatar = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileAssociated $associated = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ViewerState $viewer = null,
        ?array $labels = null,
        ?bool $chatDisabled = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->displayName = $displayName;
        $instance->avatar = $avatar;
        $instance->associated = $associated;
        $instance->viewer = $viewer;
        $instance->labels = $labels;
        $instance->chatDisabled = $chatDisabled;

        return $instance;
    }
}
