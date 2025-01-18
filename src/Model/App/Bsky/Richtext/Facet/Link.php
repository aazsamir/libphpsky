<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet;

/**
 * object
 */
class Link implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'link';
    public const ID = 'app.bsky.richtext.facet';

    public string $uri;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $uri): self
    {
        $instance = new self();
        $instance->uri = $uri;

        return $instance;
    }
}
