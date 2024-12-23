<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileViewBasic implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'profileViewBasic';
    public const ID = 'chat.bsky.actor.defs';

    public string $did;
    public string $handle;
    public ?string $displayName = null;
    public ?string $avatar = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileAssociated $associated = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ViewerState $viewer = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] */
    public ?array $labels = [];
    public ?bool $chatDisabled = null;

    public static function id(): string
    {
        return self::ID;
    }
}
