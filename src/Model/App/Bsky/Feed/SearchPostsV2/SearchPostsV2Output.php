<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPostsV2;

/**
 * object
 */
class SearchPostsV2Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.searchPostsV2';

    /** @var ?string Cursor for the next page of results. */
    public ?string $cursor;

    /** @var ?int Estimated total number of matching hits. May be rounded or truncated. */
    public ?int $hitsTotal;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView> Hydrated views of matching posts. */
    public array $posts = [];

    /** @var ?array<string> Query languages detected for CJK, Thai, or Arabic text. Empty or omitted for other scripts. */
    public ?array $detectedQueryLanguages = [];

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
        return ['posts'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView> $posts
     * @param array<string> $detectedQueryLanguages
     */
    public static function new(
        array $posts,
        ?string $cursor = null,
        ?int $hitsTotal = null,
        ?array $detectedQueryLanguages = [],
    ): self {
        $instance = new self();
        $instance->posts = $posts;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($hitsTotal !== null) {
            $instance->hitsTotal = $hitsTotal;
        }
        if ($detectedQueryLanguages !== null) {
            $instance->detectedQueryLanguages = $detectedQueryLanguages;
        }

        return $instance;
    }
}
