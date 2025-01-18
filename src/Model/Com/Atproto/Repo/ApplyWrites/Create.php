<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class Create implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'create';
    public const ID = 'com.atproto.repo.applyWrites';

    public string $collection;
    public ?string $rkey = null;
    public mixed $value;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $collection, mixed $value, ?string $rkey = null): self
    {
        $instance = new self();
        $instance->collection = $collection;
        $instance->value = $value;
        $instance->rkey = $rkey;

        return $instance;
    }
}
