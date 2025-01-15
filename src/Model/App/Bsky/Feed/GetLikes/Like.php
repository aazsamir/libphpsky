<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes;

/**
 * object
 */
class Like implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'like';
    public const ID = 'app.bsky.feed.getLikes';

    public \DateTimeInterface $indexedAt;
    public \DateTimeInterface $createdAt;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $actor = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        \DateTimeInterface $indexedAt,
        \DateTimeInterface $createdAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $actor = null,
    ): self {
        $instance = new self();
        $instance->indexedAt = $indexedAt;
        $instance->createdAt = $createdAt;
        $instance->actor = $actor;

        return $instance;
    }
}
