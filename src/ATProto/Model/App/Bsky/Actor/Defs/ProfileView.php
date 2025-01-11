<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'profileView';
    public const ID = 'app.bsky.actor.defs';

    public string $did;
    public string $handle;
    public ?string $displayName = null;
    public ?string $description = null;
    public ?string $avatar = null;
    public ?ProfileAssociated $associated = null;
    public ?string $indexedAt = null;
    public ?string $createdAt = null;
    public ?ViewerState $viewer = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $did,
        string $handle,
        ?string $displayName = null,
        ?string $description = null,
        ?string $avatar = null,
        ?ProfileAssociated $associated = null,
        ?string $indexedAt = null,
        ?string $createdAt = null,
        ?ViewerState $viewer = null,
        ?array $labels = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->displayName = $displayName;
        $instance->description = $description;
        $instance->avatar = $avatar;
        $instance->associated = $associated;
        $instance->indexedAt = $indexedAt;
        $instance->createdAt = $createdAt;
        $instance->viewer = $viewer;
        $instance->labels = $labels;

        return $instance;
    }
}
