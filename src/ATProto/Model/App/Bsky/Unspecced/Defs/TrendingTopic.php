<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class TrendingTopic implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'trendingTopic';
    public const ID = 'app.bsky.unspecced.defs';

    public string $topic;
    public ?string $displayName = null;
    public ?string $description = null;
    public string $link;

    public static function id(): string
    {
        return self::ID;
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
        $instance->displayName = $displayName;
        $instance->description = $description;

        return $instance;
    }
}
