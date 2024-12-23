<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\Defs;

/**
 * object
 */
class CommitMeta implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'commitMeta';
    public const ID = 'com.atproto.repo.defs';

    public string $cid;
    public string $rev;

    public static function id(): string
    {
        return self::ID;
    }
}
