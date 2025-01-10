<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post;

/**
 * object
 */
class Entity implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'entity';
    public const ID = 'app.bsky.feed.post';

    public ?TextSlice $index = null;
    public string $type;
    public string $value;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $type, string $value, ?TextSlice $index = null): self
    {
        $instance = new self();
        $instance->type = $type;
        $instance->value = $value;
        $instance->index = $index;

        return $instance;
    }
}
