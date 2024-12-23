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

    /** @var string[] */
    public ?array $detachedEmbeddingUris = [];

    /** @var mixed[] */
    public ?array $embeddingRules = [];

    public static function id(): string
    {
        return self::ID;
    }
}
