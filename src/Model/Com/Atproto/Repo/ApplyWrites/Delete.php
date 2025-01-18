<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class Delete implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'delete';
    public const ID = 'com.atproto.repo.applyWrites';

    public string $collection;
    public string $rkey;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $collection, string $rkey): self
    {
        $instance = new self();
        $instance->collection = $collection;
        $instance->rkey = $rkey;

        return $instance;
    }
}
