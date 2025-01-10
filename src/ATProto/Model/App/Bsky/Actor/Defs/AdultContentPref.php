<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class AdultContentPref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'adultContentPref';
    public const ID = 'app.bsky.actor.defs';

    public bool $enabled;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(bool $enabled): self
    {
        $instance = new self();
        $instance->enabled = $enabled;

        return $instance;
    }
}
