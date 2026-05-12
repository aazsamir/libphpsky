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

    /** @var ?string The URI of the Atmosphere record representing this external content, if it exists. Example: a site.standard.document record. */
    public ?string $associatedRecord;

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

    public static function new(
        string $uri,
        string $title,
        string $description,
        ?string $thumb = null,
        ?string $associatedRecord = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->title = $title;
        $instance->description = $description;
        if ($thumb !== null) {
            $instance->thumb = $thumb;
        }
        if ($associatedRecord !== null) {
            $instance->associatedRecord = $associatedRecord;
        }

        return $instance;
    }
}
