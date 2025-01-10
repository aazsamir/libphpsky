<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'recordView';
    public const ID = 'tools.ozone.moderation.defs';

    public string $uri;
    public string $cid;
    public mixed $value;

    /** @var string[] */
    public array $blobCids = [];
    public string $indexedAt;
    public Moderation $moderation;
    public ?RepoView $repo = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $blobCids
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $value,
        array $blobCids,
        string $indexedAt,
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
        $instance->repo = $repo;

        return $instance;
    }
}
