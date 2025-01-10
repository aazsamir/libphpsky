<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef;

/**
 * object
 */
class StrongRef implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.strongRef';

    public string $uri;
    public string $cid;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $uri, string $cid): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;

        return $instance;
    }
}
