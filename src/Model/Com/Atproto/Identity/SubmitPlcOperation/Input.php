<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SubmitPlcOperation;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.identity.submitPlcOperation';

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
