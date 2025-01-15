<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailUpdate;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.requestEmailUpdate';

    public bool $tokenRequired;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(bool $tokenRequired): self
    {
        $instance = new self();
        $instance->tokenRequired = $tokenRequired;

        return $instance;
    }
}