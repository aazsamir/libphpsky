<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Postgate;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.feed.postgate';

    public string $createdAt;
    public string $post;

    /** @var array<string>|null */
    public ?array $detachedEmbeddingUris = [];

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Postgate\DisableRule>|null */
    public ?array $embeddingRules = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $detachedEmbeddingUris
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Postgate\DisableRule> $embeddingRules
     */
    public static function new(
        string $createdAt,
        string $post,
        ?array $detachedEmbeddingUris = null,
        ?array $embeddingRules = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->post = $post;
        $instance->detachedEmbeddingUris = $detachedEmbeddingUris;
        $instance->embeddingRules = $embeddingRules;

        return $instance;
    }
}
