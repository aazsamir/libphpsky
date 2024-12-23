<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class Delete implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'delete';
    public const ID = 'com.atproto.repo.applyWrites';

    public string $collection;
    public string $rkey;

    public static function id(): string
    {
        return self::ID;
    }
}
