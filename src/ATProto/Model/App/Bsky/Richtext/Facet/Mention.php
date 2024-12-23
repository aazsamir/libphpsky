<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet;

/**
 * object
 */
class Mention implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mention';
    public const ID = 'app.bsky.richtext.facet';

    public string $did;

    public static function id(): string
    {
        return self::ID;
    }
}
