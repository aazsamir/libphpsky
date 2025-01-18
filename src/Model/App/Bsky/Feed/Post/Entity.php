<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post;

/**
 * object
 */
class Entity implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

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
