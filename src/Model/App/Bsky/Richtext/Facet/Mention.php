<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet;

/**
 * object
 */
class Mention implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'mention';
    public const ID = 'app.bsky.richtext.facet';

    public string $did;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $did): self
    {
        $instance = new self();
        $instance->did = $did;

        return $instance;
    }
}
