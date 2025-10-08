<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * Metadata about the requesting account's relationship with the subject account. Only has meaningful content for authed requests.
 * object
 */
class ViewerState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewerState';
    public const ID = 'app.bsky.actor.defs';

    public ?bool $muted;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic $mutedByList;
    public ?bool $blockedBy;
    public ?string $blocking;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListViewBasic $blockingByList;
    public ?string $following;
    public ?string $followedBy;

    /** @var ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\KnownFollowers This property is present only in selected cases, as an optimization. */
    public ?KnownFollowers $knownFollowers;

    /** @var ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\ActivitySubscription This property is present only in selected cases, as an optimization. */
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\ActivitySubscription $activitySubscription;

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
        return [];
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
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\ActivitySubscription $activitySubscription = null,
    ): self {
        $instance = new self();
        if ($muted !== null) {
            $instance->muted = $muted;
        }
        if ($mutedByList !== null) {
            $instance->mutedByList = $mutedByList;
        }
        if ($blockedBy !== null) {
            $instance->blockedBy = $blockedBy;
        }
        if ($blocking !== null) {
            $instance->blocking = $blocking;
        }
        if ($blockingByList !== null) {
            $instance->blockingByList = $blockingByList;
        }
        if ($following !== null) {
            $instance->following = $following;
        }
        if ($followedBy !== null) {
            $instance->followedBy = $followedBy;
        }
        if ($knownFollowers !== null) {
            $instance->knownFollowers = $knownFollowers;
        }
        if ($activitySubscription !== null) {
            $instance->activitySubscription = $activitySubscription;
        }

        return $instance;
    }
}
