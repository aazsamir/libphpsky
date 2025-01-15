<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ThreadViewPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'threadViewPref';
    public const ID = 'app.bsky.actor.defs';

    public ?string $sort = null;
    public ?bool $prioritizeFollowedUsers = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $sort = null, ?bool $prioritizeFollowedUsers = null): self
    {
        $instance = new self();
        $instance->sort = $sort;
        $instance->prioritizeFollowedUsers = $prioritizeFollowedUsers;

        return $instance;
    }
}
