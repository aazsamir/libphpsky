<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs;

/**
 * View to present drafts data to users.
 * object
 */
class DraftView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'draftView';
    public const ID = 'app.bsky.draft.defs';

    /** @var string A TID to be used as a draft identifier. */
    public string $id;
    public Draft $draft;

    /** @var \DateTimeInterface The time the draft was created. */
    public \DateTimeInterface $createdAt;

    /** @var \DateTimeInterface The time the draft was last updated. */
    public \DateTimeInterface $updatedAt;

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
        return ['id', 'draft', 'createdAt', 'updatedAt'];
    }

    public static function new(
        string $id,
        Draft $draft,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->draft = $draft;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;

        return $instance;
    }
}
