<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckSignupQueue;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.temp.checkSignupQueue';

    public bool $activated;
    public ?int $placeInQueue;
    public ?int $estimatedTimeMs;

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
        return ['activated'];
    }

    public static function new(bool $activated, ?int $placeInQueue = null, ?int $estimatedTimeMs = null): self
    {
        $instance = new self();
        $instance->activated = $activated;
        if ($placeInQueue !== null) {
            $instance->placeInQueue = $placeInQueue;
        }
        if ($estimatedTimeMs !== null) {
            $instance->estimatedTimeMs = $estimatedTimeMs;
        }

        return $instance;
    }
}
