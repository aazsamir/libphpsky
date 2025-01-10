<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListRecords;

/**
 * object
 */
class Record implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'record';
    public const ID = 'com.atproto.repo.listRecords';

    public string $uri;
    public string $cid;
    public mixed $value;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $uri, string $cid, mixed $value): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->value = $value;

        return $instance;
    }
}
