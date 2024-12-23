<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class GeneratorView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'generatorView';
    public const ID = 'app.bsky.feed.defs';

    public string $uri;
    public string $cid;
    public string $did;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView $creator = null;
    public string $displayName;
    public ?string $description = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet[] */
    public ?array $descriptionFacets = [];
    public ?string $avatar = null;
    public ?int $likeCount = null;
    public ?bool $acceptsInteractions = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] */
    public ?array $labels = [];
    public ?GeneratorViewerState $viewer = null;
    public string $indexedAt;

    public static function id(): string
    {
        return self::ID;
    }
}
