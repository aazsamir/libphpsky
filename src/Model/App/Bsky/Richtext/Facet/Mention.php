<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet;

/**
 * Facet feature for mention of another account. The text is usually a handle, including a '@' prefix, but the facet reference is a DID.
 * object
 */
class Mention implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'mention';
    public const ID = 'app.bsky.richtext.facet';

    public string $did;

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
        return ['did'];
    }

    public static function new(string $did): self
    {
        $instance = new self();
        $instance->did = $did;

        return $instance;
    }
}
