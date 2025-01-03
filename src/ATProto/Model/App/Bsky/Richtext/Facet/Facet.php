<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet;

/**
 * object
 */
class Facet implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.richtext.facet';

    public ?ByteSlice $index = null;

    /** @var mixed[] */
    public array $features = [];

    public static function id(): string
    {
        return self::ID;
    }
}
