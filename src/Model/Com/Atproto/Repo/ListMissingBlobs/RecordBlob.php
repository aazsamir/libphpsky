<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListMissingBlobs;

/**
 * object
 */
class RecordBlob implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'recordBlob';
    public const ID = 'com.atproto.repo.listMissingBlobs';

    public string $cid;
    public string $recordUri;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $cid, string $recordUri): self
    {
        $instance = new self();
        $instance->cid = $cid;
        $instance->recordUri = $recordUri;

        return $instance;
    }
}