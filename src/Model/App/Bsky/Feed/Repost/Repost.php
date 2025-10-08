<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Repost;

/**
 * object
 */
class Repost implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.repost';

    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject;
    public \DateTimeInterface $createdAt;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $via;

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
        return ['subject', 'createdAt'];
    }

    public static function new(
        \DateTimeInterface $createdAt,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $via = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        if ($subject !== null) {
            $instance->subject = $subject;
        }
        if ($via !== null) {
            $instance->via = $via;
        }

        return $instance;
    }
}
