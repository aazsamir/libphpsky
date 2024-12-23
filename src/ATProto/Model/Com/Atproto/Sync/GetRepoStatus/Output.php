<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\GetRepoStatus;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.sync.getRepoStatus';

    public string $did;
    public bool $active;
    public ?string $status = null;
    public ?string $rev = null;

    public static function id(): string
    {
        return self::ID;
    }
}
