<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\External;

/**
 * object
 */
class ViewExternal implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewExternal';
    public const ID = 'app.bsky.embed.external';

    public string $uri;
    public string $title;
    public string $description;
    public ?string $thumb;

    /** @var ?\DateTimeInterface When the external content was created, if available. Example: a publication date, for an article. */
    public ?\DateTimeInterface $createdAt;

    /** @var ?\DateTimeInterface When the external content was updated, if available. */
    public ?\DateTimeInterface $updatedAt;

    /** @var ?int Estimated reading time in minutes, if applicable and available. */
    public ?int $readingTime;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];
    public ?ViewExternalSource $source;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef> StrongRefs (uri+cid) of the Atmosphere records that backed this view. */
    public ?array $associatedRefs = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic> Profiles of the owners of the Atmosphere records that backed this view. */
    public ?array $associatedProfiles = [];

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
        return ['uri', 'title', 'description'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef> $associatedRefs
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic> $associatedProfiles
     */
    public static function new(
        string $uri,
        string $title,
        string $description,
        ?string $thumb = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $updatedAt = null,
        ?int $readingTime = null,
        ?array $labels = [],
        ?ViewExternalSource $source = null,
        ?array $associatedRefs = [],
        ?array $associatedProfiles = [],
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->title = $title;
        $instance->description = $description;
        if ($thumb !== null) {
            $instance->thumb = $thumb;
        }
        if ($createdAt !== null) {
            $instance->createdAt = $createdAt;
        }
        if ($updatedAt !== null) {
            $instance->updatedAt = $updatedAt;
        }
        if ($readingTime !== null) {
            $instance->readingTime = $readingTime;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($source !== null) {
            $instance->source = $source;
        }
        if ($associatedRefs !== null) {
            $instance->associatedRefs = $associatedRefs;
        }
        if ($associatedProfiles !== null) {
            $instance->associatedProfiles = $associatedProfiles;
        }

        return $instance;
    }
}
