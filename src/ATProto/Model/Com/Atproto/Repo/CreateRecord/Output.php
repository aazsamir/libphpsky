<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\CreateRecord;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.createRecord';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null;
    public ?string $validationStatus = null;

    public static function id(): string
    {
        return self::ID;
    }
}
