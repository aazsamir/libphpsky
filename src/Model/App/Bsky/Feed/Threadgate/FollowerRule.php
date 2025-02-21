<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate;

/**
 * Allow replies from actors who follow you.
 * object
 */
class FollowerRule implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'followerRule';
    public const ID = 'app.bsky.feed.threadgate';

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

    public static function new(): self
    {
        $instance = new self();

        return $instance;
    }
}
