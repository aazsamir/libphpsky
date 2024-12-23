<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Temp\CheckSignupQueue;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.temp.checkSignupQueue';

    public bool $activated;
    public ?int $placeInQueue = null;
    public ?int $estimatedTimeMs = null;

    public static function id(): string
    {
        return self::ID;
    }
}
