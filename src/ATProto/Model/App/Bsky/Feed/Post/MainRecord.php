<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.feed.post';

    public string $text;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post\Entity[] */
    public ?array $entities = [];

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet[] */
    public ?array $facets = [];
    public ?ReplyRef $reply = null;
    public mixed $embed = null;

    /** @var string[] */
    public ?array $langs = [];
    public mixed $labels = null;

    /** @var string[] */
    public ?array $tags = [];
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }
}
