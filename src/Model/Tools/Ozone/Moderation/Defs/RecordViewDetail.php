<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordViewDetail implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'recordViewDetail';
    public const ID = 'tools.ozone.moderation.defs';

    public string $uri;
    public string $cid;
    public mixed $value;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\BlobView> */
    public array $blobs = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];
    public \DateTimeInterface $indexedAt;
    public ?ModerationDetail $moderation;
    public ?RepoView $repo;

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
        return ['uri', 'cid', 'value', 'blobs', 'indexedAt', 'moderation', 'repo'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\BlobView> $blobs
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $value,
        array $blobs,
        \DateTimeInterface $indexedAt,
        ?array $labels = [],
        ?ModerationDetail $moderation = null,
        ?RepoView $repo = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->value = $value;
        $instance->blobs = $blobs;
        $instance->indexedAt = $indexedAt;
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($moderation !== null) {
            $instance->moderation = $moderation;
        }
        if ($repo !== null) {
            $instance->repo = $repo;
        }

        return $instance;
    }
}
