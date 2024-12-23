<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\ListRepos;

/**
 * object
 */
class Repo implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'repo';
    public const ID = 'com.atproto.sync.listRepos';

    public string $did;
    public string $head;
    public string $rev;
    public ?bool $active = null;
    public ?string $status = null;

    public static function id(): string
    {
        return self::ID;
    }
}
