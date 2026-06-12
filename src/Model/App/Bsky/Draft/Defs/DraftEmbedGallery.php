<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs;

/**
 * object
 */
class DraftEmbedGallery implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'draftEmbedGallery';
    public const ID = 'app.bsky.draft.defs';

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedImage> */
    public ?array $items = [];

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
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedImage> $items
     */
    public static function new(?array $items = []): self
    {
        $instance = new self();
        if ($items !== null) {
            $instance->items = $items;
        }

        return $instance;
    }
}
