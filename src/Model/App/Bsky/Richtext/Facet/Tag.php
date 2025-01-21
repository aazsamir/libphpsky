<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet;

/**
 * Facet feature for a hashtag. The text usually includes a '#' prefix, but the facet reference should not (except in the case of 'double hash tags').
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
        return ['tag'];
    }

    public static function new(string $tag): self
    {
        $instance = new self();
        $instance->tag = $tag;

        return $instance;
    }
}
