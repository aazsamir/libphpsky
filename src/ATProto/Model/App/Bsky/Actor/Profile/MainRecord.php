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
    public mixed $labels = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $joinedViaStarterPack = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $pinnedPost = null;
    public ?string $createdAt = null;

    public static function id(): string
    {
        return self::ID;
    }
}
