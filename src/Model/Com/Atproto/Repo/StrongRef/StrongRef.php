<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef;

/**
 * object
 */
class StrongRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.strongRef';

    public string $uri;
    public string $cid;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['uri', 'cid'];
    }

    public static function new(string $uri, string $cid): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;

        return $instance;
    }
}
