<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileViewBasic implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'profileViewBasic';
    public const ID = 'app.bsky.actor.defs';

    public string $did;
    public string $handle;
    public ?string $displayName = null;
    public ?string $avatar = null;
    public ?ProfileAssociated $associated = null;
    public ?ViewerState $viewer = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?\DateTimeInterface $createdAt = null;

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
        ?string $avatar = null,
        ?ProfileAssociated $associated = null,
        ?ViewerState $viewer = null,
        ?array $labels = null,
        ?\DateTimeInterface $createdAt = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->displayName = $displayName;
        $instance->avatar = $avatar;
        $instance->associated = $associated;
        $instance->viewer = $viewer;
        $instance->labels = $labels;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
