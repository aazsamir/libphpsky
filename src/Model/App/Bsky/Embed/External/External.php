<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\External;

/**
 * object
 */
class External implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'external';
    public const ID = 'app.bsky.embed.external';

    public string $uri;
    public string $title;
    public string $description;
    public ?string $thumb;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef> StrongRefs (uri+cid) of the Atmosphere records that backed this view. */
    public ?array $associatedRefs = [];

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
        return ['uri', 'title', 'description'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef> $associatedRefs
     */
    public static function new(
        string $uri,
        string $title,
        string $description,
        ?string $thumb = null,
        ?array $associatedRefs = [],
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->title = $title;
        $instance->description = $description;
        if ($thumb !== null) {
            $instance->thumb = $thumb;
        }
        if ($associatedRefs !== null) {
            $instance->associatedRefs = $associatedRefs;
        }

        return $instance;
    }
}
