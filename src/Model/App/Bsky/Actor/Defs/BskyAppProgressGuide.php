<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class BskyAppProgressGuide implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'bskyAppProgressGuide';
    public const ID = 'app.bsky.actor.defs';

    public string $guide;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $guide): self
    {
        $instance = new self();
        $instance->guide = $guide;

        return $instance;
    }
}
