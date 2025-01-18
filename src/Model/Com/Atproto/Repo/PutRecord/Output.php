<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\PutRecord;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.putRecord';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs\CommitMeta $commit;
    public ?string $validationStatus;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $uri,
        string $cid,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null,
        ?string $validationStatus = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->commit = $commit;
        $instance->validationStatus = $validationStatus;

        return $instance;
    }
}
