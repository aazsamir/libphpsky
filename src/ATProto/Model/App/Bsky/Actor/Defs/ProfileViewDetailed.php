<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileViewDetailed implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

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
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\StarterPackViewBasic $joinedViaStarterPack = null;
    public ?string $indexedAt = null;
    public ?string $createdAt = null;
    public ?ViewerState $viewer = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] */
    public ?array $labels = [];
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null;

    public static function id(): string
    {
        return self::ID;
    }
}
