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

    public ?string $displayName;

    /** @var ?string Free-form profile description text. */
    public ?string $description;

    /** @var ?string Free-form pronouns text. */
    public ?string $pronouns;
    public ?string $website;

    /** @var ?string Small image to be displayed next to posts from account. AKA, 'profile picture' */
    public ?string $avatar;

    /** @var ?string Larger horizontal image to display behind profile view. */
    public ?string $banner;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null Self-label values, specific to the Bluesky application, on the overall account. */
    public mixed $labels;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $joinedViaStarterPack;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost;
    public ?\DateTimeInterface $createdAt;

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
        return [];
    }

    public static function new(
        ?string $displayName = null,
        ?string $description = null,
        ?string $pronouns = null,
        ?string $website = null,
        ?string $avatar = null,
        ?string $banner = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $joinedViaStarterPack = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null,
        ?\DateTimeInterface $createdAt = null,
    ): self {
        $instance = new self();
        if ($displayName !== null) {
            $instance->displayName = $displayName;
        }
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($pronouns !== null) {
            $instance->pronouns = $pronouns;
        }
        if ($website !== null) {
            $instance->website = $website;
        }
        if ($avatar !== null) {
            $instance->avatar = $avatar;
        }
        if ($banner !== null) {
            $instance->banner = $banner;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($joinedViaStarterPack !== null) {
            $instance->joinedViaStarterPack = $joinedViaStarterPack;
        }
        if ($pinnedPost !== null) {
            $instance->pinnedPost = $pinnedPost;
        }
        if ($createdAt !== null) {
            $instance->createdAt = $createdAt;
        }

        return $instance;
    }
}
