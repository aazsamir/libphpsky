<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs;

/**
 * object
 */
class DraftEmbedVideo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'draftEmbedVideo';
    public const ID = 'app.bsky.draft.defs';

    public ?DraftEmbedLocalRef $localRef;
    public ?string $alt;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedCaption> */
    public ?array $captions = [];

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

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedCaption> $captions
     */
    public static function new(?DraftEmbedLocalRef $localRef = null, ?string $alt = null, ?array $captions = []): self
    {
        $instance = new self();
        if ($localRef !== null) {
            $instance->localRef = $localRef;
        }
        if ($alt !== null) {
            $instance->alt = $alt;
        }
        if ($captions !== null) {
            $instance->captions = $captions;
        }

        return $instance;
    }
}
