<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'recordView';
    public const ID = 'tools.ozone.moderation.defs';

    public string $uri;
    public string $cid;
    public mixed $value;

    /** @var array<string> */
    public array $blobCids = [];
    public \DateTimeInterface $indexedAt;
    public Moderation $moderation;
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
        return ['uri', 'cid', 'value', 'blobCids', 'indexedAt', 'moderation', 'repo'];
    }

    /**
     * @param array<string> $blobCids
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $value,
        array $blobCids,
        \DateTimeInterface $indexedAt,
        Moderation $moderation,
        ?RepoView $repo = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->value = $value;
        $instance->blobCids = $blobCids;
        $instance->indexedAt = $indexedAt;
        $instance->moderation = $moderation;
        if ($repo !== null) {
            $instance->repo = $repo;
        }

        return $instance;
    }
}
