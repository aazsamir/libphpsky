<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Like;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.feed.like';

    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject = null;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $createdAt,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->subject = $subject;

        return $instance;
    }
}
