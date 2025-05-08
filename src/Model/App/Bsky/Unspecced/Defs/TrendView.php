<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class TrendView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'trendView';
    public const ID = 'app.bsky.unspecced.defs';

    public string $topic;
    public string $displayName;
    public string $link;
    public \DateTimeInterface $startedAt;
    public int $postCount;
    public ?string $status;
    public ?string $category;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic> */
    public array $actors = [];

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
        return ['topic', 'displayName', 'link', 'startedAt', 'postCount', 'actors'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic> $actors
     */
    public static function new(
        string $topic,
        string $displayName,
        string $link,
        \DateTimeInterface $startedAt,
        int $postCount,
        array $actors,
        ?string $status = null,
        ?string $category = null,
    ): self {
        $instance = new self();
        $instance->topic = $topic;
        $instance->displayName = $displayName;
        $instance->link = $link;
        $instance->startedAt = $startedAt;
        $instance->postCount = $postCount;
        $instance->actors = $actors;
        if ($status !== null) {
            $instance->status = $status;
        }
        if ($category !== null) {
            $instance->category = $category;
        }

        return $instance;
    }
}
