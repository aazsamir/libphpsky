<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet;

/**
 * object
 */
class Tag implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'tag';
    public const ID = 'app.bsky.richtext.facet';

    public string $tag;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $tag): self
    {
        $instance = new self();
        $instance->tag = $tag;

        return $instance;
    }
}
