<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ViewerState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewerState';
    public const ID = 'app.bsky.actor.defs';

    public ?bool $muted = null;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic $mutedByList = null;
    public ?bool $blockedBy = null;
    public ?string $blocking = null;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic $blockingByList = null;
    public ?string $following = null;
    public ?string $followedBy = null;
    public ?KnownFollowers $knownFollowers = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?bool $muted = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic $mutedByList = null,
        ?bool $blockedBy = null,
        ?string $blocking = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic $blockingByList = null,
        ?string $following = null,
        ?string $followedBy = null,
        ?KnownFollowers $knownFollowers = null,
    ): self {
        $instance = new self();
        $instance->muted = $muted;
        $instance->mutedByList = $mutedByList;
        $instance->blockedBy = $blockedBy;
        $instance->blocking = $blocking;
        $instance->blockingByList = $blockingByList;
        $instance->following = $following;
        $instance->followedBy = $followedBy;
        $instance->knownFollowers = $knownFollowers;

        return $instance;
    }
}
