<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileViewDetailed implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'profileViewDetailed';
    public const ID = 'app.bsky.actor.defs';

    public string $did;
    public string $handle;
    public ?string $displayName;
    public ?string $description;
    public ?string $avatar;
    public ?string $banner;
    public ?int $followersCount;
    public ?int $followsCount;
    public ?int $postsCount;
    public ?ProfileAssociated $associated;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackViewBasic $joinedViaStarterPack;
    public ?\DateTimeInterface $indexedAt;
    public ?\DateTimeInterface $createdAt;
    public ?ViewerState $viewer;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost;
    public ?VerificationState $verification;
    public ?StatusView $status;

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
        return ['did', 'handle'];
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
        ?\DateTimeInterface $indexedAt = null,
        ?\DateTimeInterface $createdAt = null,
        ?ViewerState $viewer = null,
        ?array $labels = [],
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null,
        ?VerificationState $verification = null,
        ?StatusView $status = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        if ($displayName !== null) {
            $instance->displayName = $displayName;
        }
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($avatar !== null) {
            $instance->avatar = $avatar;
        }
        if ($banner !== null) {
            $instance->banner = $banner;
        }
        if ($followersCount !== null) {
            $instance->followersCount = $followersCount;
        }
        if ($followsCount !== null) {
            $instance->followsCount = $followsCount;
        }
        if ($postsCount !== null) {
            $instance->postsCount = $postsCount;
        }
        if ($associated !== null) {
            $instance->associated = $associated;
        }
        if ($joinedViaStarterPack !== null) {
            $instance->joinedViaStarterPack = $joinedViaStarterPack;
        }
        if ($indexedAt !== null) {
            $instance->indexedAt = $indexedAt;
        }
        if ($createdAt !== null) {
            $instance->createdAt = $createdAt;
        }
        if ($viewer !== null) {
            $instance->viewer = $viewer;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($pinnedPost !== null) {
            $instance->pinnedPost = $pinnedPost;
        }
        if ($verification !== null) {
            $instance->verification = $verification;
        }
        if ($status !== null) {
            $instance->status = $status;
        }

        return $instance;
    }
}
