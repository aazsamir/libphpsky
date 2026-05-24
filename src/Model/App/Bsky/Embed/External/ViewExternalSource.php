<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\External;

/**
 * The source of an external embed, such as a standard.site publication.
 * object
 */
class ViewExternalSource implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewExternalSource';
    public const ID = 'app.bsky.embed.external';

    /** @var string URI of the source, if available. Example: the https:// URL of a site.standard.publication record. */
    public string $uri;

    /** @var ?string Fully-qualified URL where an icon representing the source can be fetched. For example, CDN location provided by the App View. */
    public ?string $icon;
    public string $title;
    public ?string $description;
    public ?ViewExternalSourceTheme $theme;

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
        return ['uri', 'title'];
    }

    public static function new(
        string $uri,
        string $title,
        ?string $icon = null,
        ?string $description = null,
        ?ViewExternalSourceTheme $theme = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->title = $title;
        if ($icon !== null) {
            $instance->icon = $icon;
        }
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($theme !== null) {
            $instance->theme = $theme;
        }

        return $instance;
    }
}
