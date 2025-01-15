<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckSignupQueue;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.temp.checkSignupQueue';

    public bool $activated;
    public ?int $placeInQueue = null;
    public ?int $estimatedTimeMs = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(bool $activated, ?int $placeInQueue = null, ?int $estimatedTimeMs = null): self
    {
        $instance = new self();
        $instance->activated = $activated;
        $instance->placeInQueue = $placeInQueue;
        $instance->estimatedTimeMs = $estimatedTimeMs;

        return $instance;
    }
}
