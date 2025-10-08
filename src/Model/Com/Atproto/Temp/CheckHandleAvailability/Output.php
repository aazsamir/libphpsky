<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckHandleAvailability;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.temp.checkHandleAvailability';

    /** @var string Echo of the input handle. */
    public string $handle;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckHandleAvailability\ResultAvailable|\Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckHandleAvailability\ResultUnavailable */
    public mixed $result;

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
        return ['handle', 'result'];
    }

    public static function new(string $handle, ResultAvailable|ResultUnavailable $result): self
    {
        $instance = new self();
        $instance->handle = $handle;
        $instance->result = $result;

        return $instance;
    }
}
