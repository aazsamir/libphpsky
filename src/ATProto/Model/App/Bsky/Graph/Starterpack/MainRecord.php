<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Starterpack;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.graph.starterpack';

    public string $name;
    public ?string $description = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet[] */
    public ?array $descriptionFacets = [];
    public string $list;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Starterpack\FeedItem[] */
    public ?array $feeds = [];
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }
}
