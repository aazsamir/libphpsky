<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video;

/**
 * object
 */
class Caption implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'caption';
    public const ID = 'app.bsky.embed.video';

    public string $lang;
    public string $file;

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
        return ['lang', 'file'];
    }

    public static function new(string $lang, string $file): self
    {
        $instance = new self();
        $instance->lang = $lang;
        $instance->file = $file;

        return $instance;
    }
}
