<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\DeleteRecord;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.deleteRecord';

    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null,
    ): self {
        $instance = new self();
        $instance->commit = $commit;

        return $instance;
    }
}
