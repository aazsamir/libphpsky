<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet;

/**
 * object
 */
class ByteSlice implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'byteSlice';
    public const ID = 'app.bsky.richtext.facet';

    public int $byteStart;
    public int $byteEnd;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $byteStart, int $byteEnd): self
    {
        $instance = new self();
        $instance->byteStart = $byteStart;
        $instance->byteEnd = $byteEnd;

        return $instance;
    }
}
