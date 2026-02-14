<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs;

/**
 * object
 */
class DraftEmbedCaption implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'draftEmbedCaption';
    public const ID = 'app.bsky.draft.defs';

    public string $lang;
    public string $content;

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
        return ['lang', 'content'];
    }

    public static function new(string $lang, string $content): self
    {
        $instance = new self();
        $instance->lang = $lang;
        $instance->content = $content;

        return $instance;
    }
}
