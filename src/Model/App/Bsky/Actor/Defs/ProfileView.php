<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'profileView';
    public const ID = 'app.bsky.actor.defs';

    public string $did;
    public string $handle;
    public ?string $displayName;
    public ?string $description;
    public ?string $avatar;
    public ?ProfileAssociated $associated;
    public ?\DateTimeInterface $indexedAt;
    public ?\DateTimeInterface $createdAt;
    public ?ViewerState $viewer;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];

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
        ?ProfileAssociated $associated = null,
        ?\DateTimeInterface $indexedAt = null,
        ?\DateTimeInterface $createdAt = null,
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
