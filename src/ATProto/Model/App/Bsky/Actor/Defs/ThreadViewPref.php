<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ThreadViewPref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'threadViewPref';
    public const ID = 'app.bsky.actor.defs';

    public ?string $sort = null;
    public ?bool $prioritizeFollowedUsers = null;

    public static function id(): string
    {
        return self::ID;
    }
}
