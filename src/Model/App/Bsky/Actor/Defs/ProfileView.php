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
        ?ProfileAssociated $associated = null,
        ?\DateTimeInterface $indexedAt = null,
        ?\DateTimeInterface $createdAt = null,
        ?ViewerState $viewer = null,
        ?array $labels = [],
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
        if ($associated !== null) {
            $instance->associated = $associated;
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

        return $instance;
    }
}
