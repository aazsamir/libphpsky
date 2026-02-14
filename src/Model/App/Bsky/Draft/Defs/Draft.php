<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs;

/**
 * A draft containing an array of draft posts.
 * object
 */
class Draft implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'draft';
    public const ID = 'app.bsky.draft.defs';

    /** @var ?string UUIDv4 identifier of the device that created this draft. */
    public ?string $deviceId;

    /** @var ?string The device and/or platform on which the draft was created. */
    public ?string $deviceName;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftPost> Array of draft posts that compose this draft. */
    public array $posts = [];

    /** @var ?array<string> Indicates human language of posts primary text content. */
    public ?array $langs = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Postgate\DisableRule> Embedding rules for the postgates to be created when this draft is published. */
    public ?array $postgateEmbeddingRules = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowerRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\ListRule> Allow-rules for the threadgate to be created when this draft is published. */
    public ?array $threadgateAllow = [];

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
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs\DraftPost> $posts
     * @param array<string> $langs
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Postgate\DisableRule> $postgateEmbeddingRules
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowerRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\ListRule> $threadgateAllow
     */
    public static function new(
        array $posts,
        ?string $deviceId = null,
        ?string $deviceName = null,
        ?array $langs = [],
        ?array $postgateEmbeddingRules = [],
        ?array $threadgateAllow = [],
    ): self {
        $instance = new self();
        $instance->posts = $posts;
        if ($deviceId !== null) {
            $instance->deviceId = $deviceId;
        }
        if ($deviceName !== null) {
            $instance->deviceName = $deviceName;
        }
        if ($langs !== null) {
            $instance->langs = $langs;
        }
        if ($postgateEmbeddingRules !== null) {
            $instance->postgateEmbeddingRules = $postgateEmbeddingRules;
        }
        if ($threadgateAllow !== null) {
            $instance->threadgateAllow = $threadgateAllow;
        }

        return $instance;
    }
}
