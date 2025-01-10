<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Profile;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.actor.profile';

    public ?string $displayName = null;
    public ?string $description = null;
    public ?string $avatar = null;
    public ?string $banner = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\SelfLabels */
    public mixed $labels = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $joinedViaStarterPack = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null;
    public ?string $createdAt = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?string $displayName = null,
        ?string $description = null,
        ?string $avatar = null,
        ?string $banner = null,
        mixed $labels = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $joinedViaStarterPack = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null,
        ?string $createdAt = null,
    ): self {
        $instance = new self();
        $instance->displayName = $displayName;
        $instance->description = $description;
        $instance->avatar = $avatar;
        $instance->banner = $banner;
        $instance->labels = $labels;
        $instance->joinedViaStarterPack = $joinedViaStarterPack;
        $instance->pinnedPost = $pinnedPost;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
