<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DeleteRecord;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.deleteRecord';

    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null): self
    {
        $instance = new self();
        $instance->commit = $commit;

        return $instance;
    }
}
