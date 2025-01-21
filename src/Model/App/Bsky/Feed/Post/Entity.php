<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post;

/**
 * Deprecated: use facets instead.
 * object
 */
class Entity implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'entity';
    public const ID = 'app.bsky.feed.post';

    public ?TextSlice $index;

    /** @var string Expected values are 'mention' and 'link'. */
    public string $type;
    public string $value;

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
        return ['index', 'type', 'value'];
    }

    public static function new(string $type, string $value, ?TextSlice $index = null): self
    {
        $instance = new self();
        $instance->type = $type;
        $instance->value = $value;
        if ($index !== null) {
            $instance->index = $index;
        }

        return $instance;
    }
}
