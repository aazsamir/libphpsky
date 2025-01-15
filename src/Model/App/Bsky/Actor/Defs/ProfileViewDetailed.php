<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileViewDetailed implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'profileViewDetailed';
    public const ID = 'app.bsky.actor.defs';

    public string $did;
    public string $handle;
    public ?string $displayName = null;
    public ?string $description = null;
    public ?string $avatar = null;
    public ?string $banner = null;
    public ?int $followersCount = null;
    public ?int $followsCount = null;
    public ?int $postsCount = null;
    public ?ProfileAssociated $associated = null;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackViewBasic $joinedViaStarterPack = null;
    public ?string $indexedAt = null;
    public ?string $createdAt = null;
    public ?ViewerState $viewer = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $did,
        string $handle,
        ?string $displayName = null,
        ?string $description = null,
        ?string $avatar = null,
        ?string $banner = null,
        ?int $followersCount = null,
        ?int $followsCount = null,
        ?int $postsCount = null,
        ?ProfileAssociated $associated = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackViewBasic $joinedViaStarterPack = null,
        ?string $indexedAt = null,
        ?string $createdAt = null,
        ?ViewerState $viewer = null,
        ?array $labels = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->displayName = $displayName;
        $instance->description = $description;
        $instance->avatar = $avatar;
        $instance->banner = $banner;
        $instance->followersCount = $followersCount;
        $instance->followsCount = $followsCount;
        $instance->postsCount = $postsCount;
        $instance->associated = $associated;
        $instance->joinedViaStarterPack = $joinedViaStarterPack;
        $instance->indexedAt = $indexedAt;
        $instance->createdAt = $createdAt;
        $instance->viewer = $viewer;
        $instance->labels = $labels;
        $instance->pinnedPost = $pinnedPost;

        return $instance;
    }
}
