<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate;

/**
 * object
 */
class FollowingRule implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'followingRule';
    public const ID = 'app.bsky.feed.threadgate';

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(): self
    {
        $instance = new self();

        return $instance;
    }
}
