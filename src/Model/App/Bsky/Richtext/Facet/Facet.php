<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet;

/**
 * object
 */
class Facet implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.richtext.facet';

    public ?ByteSlice $index = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Mention|\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Link|\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Tag> */
    public array $features = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Mention|\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Link|\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Tag> $features
     */
    public static function new(array $features, ?ByteSlice $index = null): self
    {
        $instance = new self();
        $instance->features = $features;
        $instance->index = $index;

        return $instance;
    }
}
