<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.createRecord';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null;
    public ?string $validationStatus = null;

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
