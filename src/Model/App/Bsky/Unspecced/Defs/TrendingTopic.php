<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class TrendingTopic implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'trendingTopic';
    public const ID = 'app.bsky.unspecced.defs';

    public string $topic;
    public ?string $displayName;
    public ?string $description;
    public string $link;

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
        return ['topic', 'link'];
    }

    public static function new(
        string $topic,
        string $link,
        ?string $displayName = null,
        ?string $description = null,
    ): self {
        $instance = new self();
        $instance->topic = $topic;
        $instance->link = $link;
        if ($displayName !== null) {
            $instance->displayName = $displayName;
        }
        if ($description !== null) {
            $instance->description = $description;
        }

        return $instance;
    }
}
