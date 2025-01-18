<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Postgate;

/**
 * object
 */
class Postgate implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.postgate';

    public \DateTimeInterface $createdAt;
    public string $post;

    /** @var array<string>|null */
    public ?array $detachedEmbeddingUris = [];

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Postgate\DisableRule>|null */
    public ?array $embeddingRules = [];

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
        return ['post', 'createdAt'];
    }

    /**
     * @param array<string> $detachedEmbeddingUris
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Postgate\DisableRule> $embeddingRules
     */
    public static function new(
        \DateTimeInterface $createdAt,
        string $post,
        ?array $detachedEmbeddingUris = [],
        ?array $embeddingRules = [],
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->post = $post;
        if ($detachedEmbeddingUris !== null) {
            $instance->detachedEmbeddingUris = $detachedEmbeddingUris;
        }
        if ($embeddingRules !== null) {
            $instance->embeddingRules = $embeddingRules;
        }

        return $instance;
    }
}
