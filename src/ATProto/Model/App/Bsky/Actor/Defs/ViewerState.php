<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ViewerState implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'viewerState';
    public const ID = 'app.bsky.actor.defs';

    public ?bool $muted = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListViewBasic $mutedByList = null;
    public ?bool $blockedBy = null;
    public ?string $blocking = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListViewBasic $blockingByList = null;
    public ?string $following = null;
    public ?string $followedBy = null;
    public ?KnownFollowers $knownFollowers = null;

    public static function id(): string
    {
        return self::ID;
    }
}
