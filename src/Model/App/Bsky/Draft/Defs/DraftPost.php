<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs;

/**
 * One of the posts that compose a draft.
 * object
 */
class DraftPost implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'draftPost';
    public const ID = 'app.bsky.draft.defs';

    /** @var string The primary post content. It has a higher limit than post contents to allow storing a larger text that can later be refined into smaller posts. */
    public string $text;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null Self-label values for this post. Effectively content warnings. */
    public mixed $labels;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedImage> */
    public ?array $embedImages = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedVideo> */
    public ?array $embedVideos = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedExternal> */
    public ?array $embedExternals = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedRecord> */
    public ?array $embedRecords = [];

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
        return ['text'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedImage> $embedImages
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedVideo> $embedVideos
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedExternal> $embedExternals
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftEmbedRecord> $embedRecords
     */
    public static function new(
        string $text,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        ?array $embedImages = [],
        ?array $embedVideos = [],
        ?array $embedExternals = [],
        ?array $embedRecords = [],
    ): self {
        $instance = new self();
        $instance->text = $text;
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($embedImages !== null) {
            $instance->embedImages = $embedImages;
        }
        if ($embedVideos !== null) {
            $instance->embedVideos = $embedVideos;
        }
        if ($embedExternals !== null) {
            $instance->embedExternals = $embedExternals;
        }
        if ($embedRecords !== null) {
            $instance->embedRecords = $embedRecords;
        }

        return $instance;
    }
}
