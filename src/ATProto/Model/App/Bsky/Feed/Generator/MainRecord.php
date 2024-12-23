<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Generator;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.feed.generator';

    public string $did;
    public string $displayName;
    public ?string $description = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet[] */
    public ?array $descriptionFacets = [];
    public ?string $avatar = null;
    public ?bool $acceptsInteractions = null;
    public mixed $labels = null;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }
}
