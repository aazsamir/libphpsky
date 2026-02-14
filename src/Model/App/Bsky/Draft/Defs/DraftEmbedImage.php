<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs;

/**
 * object
 */
class DraftEmbedImage implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'draftEmbedImage';
    public const ID = 'app.bsky.draft.defs';

    public ?DraftEmbedLocalRef $localRef;
    public ?string $alt;

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
        return ['localRef'];
    }

    public static function new(?DraftEmbedLocalRef $localRef = null, ?string $alt = null): self
    {
        $instance = new self();
        if ($localRef !== null) {
            $instance->localRef = $localRef;
        }
        if ($alt !== null) {
            $instance->alt = $alt;
        }

        return $instance;
    }
}
