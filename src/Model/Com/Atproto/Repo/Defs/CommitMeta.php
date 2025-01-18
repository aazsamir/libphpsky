<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs;

/**
 * object
 */
class CommitMeta implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'commitMeta';
    public const ID = 'com.atproto.repo.defs';

    public string $cid;
    public string $rev;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $cid, string $rev): self
    {
        $instance = new self();
        $instance->cid = $cid;
        $instance->rev = $rev;

        return $instance;
    }
}
