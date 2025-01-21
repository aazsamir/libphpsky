<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * If set, an active progress guide. Once completed, can be set to undefined. Should have unspecced fields tracking progress.
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
        return ['guide'];
    }

    public static function new(string $guide): self
    {
        $instance = new self();
        $instance->guide = $guide;

        return $instance;
    }
}
