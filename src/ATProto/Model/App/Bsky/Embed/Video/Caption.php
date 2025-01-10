<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video;

/**
 * object
 */
class Caption implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'caption';
    public const ID = 'app.bsky.embed.video';

    public string $lang;
    public string $file;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $lang, string $file): self
    {
        $instance = new self();
        $instance->lang = $lang;
        $instance->file = $file;

        return $instance;
    }
}
