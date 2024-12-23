<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class ListView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'listView';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView $creator = null;
    public string $name;
    public ?string $purpose = null;
    public ?string $description = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet[] */
    public ?array $descriptionFacets = [];
    public ?string $avatar = null;
    public ?int $listItemCount = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] */
    public ?array $labels = [];
    public ?ListViewerState $viewer = null;
    public string $indexedAt;

    public static function id(): string
    {
        return self::ID;
    }
}
