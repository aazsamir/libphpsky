<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListReposByCollection;

/**
 * object
 */
class Repo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'repo';
    public const ID = 'com.atproto.sync.listReposByCollection';

    public string $did;

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
        return ['did'];
    }

    public static function new(string $did): self
    {
        $instance = new self();
        $instance->did = $did;

        return $instance;
    }
}
