<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\SignPlcOperation;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.identity.signPlcOperation';

    public mixed $operation;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(mixed $operation): self
    {
        $instance = new self();
        $instance->operation = $operation;

        return $instance;
    }
}
