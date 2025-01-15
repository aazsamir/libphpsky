<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class KnownFollowers implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'knownFollowers';
    public const ID = 'app.bsky.actor.defs';

    public int $count;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic> */
    public array $followers = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic> $followers
     */
    public static function new(int $count, array $followers): self
    {
        $instance = new self();
        $instance->count = $count;
        $instance->followers = $followers;

        return $instance;
    }
}
