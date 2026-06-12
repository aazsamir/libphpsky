<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Gallery;

/**
 * object
 */
class Gallery implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.embed.gallery';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Gallery\Image> The schema-level maxLength of 20 is a future-proof ceiling. Clients should currently enforce a soft limit of 10 items in authoring UIs. */
    public array $items = [];

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
        return ['items'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Gallery\Image> $items
     */
    public static function new(array $items): self
    {
        $instance = new self();
        $instance->items = $items;

        return $instance;
    }
}
