<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Profile;

/**
 * object
 */
class Profile implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.profile';

    public ?string $displayName = null;
    public ?string $description = null;
    public ?string $avatar = null;
    public ?string $banner = null;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null */
    public mixed $labels = null;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $joinedViaStarterPack = null;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null;
    public ?\DateTimeInterface $createdAt = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?string $displayName = null,
        ?string $description = null,
        ?string $avatar = null,
        ?string $banner = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $joinedViaStarterPack = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null,
        ?\DateTimeInterface $createdAt = null,
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
