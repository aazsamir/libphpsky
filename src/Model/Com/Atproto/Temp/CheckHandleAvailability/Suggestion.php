<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckHandleAvailability;

/**
 * object
 */
class Suggestion implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'suggestion';
    public const ID = 'com.atproto.temp.checkHandleAvailability';

    public string $handle;

    /** @var string Method used to build this suggestion. Should be considered opaque to clients. Can be used for metrics. */
    public string $method;

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
        return ['handle', 'method'];
    }

    public static function new(string $handle, string $method): self
    {
        $instance = new self();
        $instance->handle = $handle;
        $instance->method = $method;

        return $instance;
    }
}
