<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\DeleteRecord;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.repo.deleteRecord';

    public string $repo;
    public string $collection;
    public string $rkey;
    public ?string $swapRecord = null;
    public ?string $swapCommit = null;

    public static function id(): string
    {
        return self::ID;
    }
}
