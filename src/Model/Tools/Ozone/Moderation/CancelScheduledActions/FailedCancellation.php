<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\CancelScheduledActions;

/**
 * object
 */
class FailedCancellation implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'failedCancellation';
    public const ID = 'tools.ozone.moderation.cancelScheduledActions';

    public string $did;
    public string $error;
    public ?string $errorCode;

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
        return ['did', 'error'];
    }

    public static function new(string $did, string $error, ?string $errorCode = null): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->error = $error;
        if ($errorCode !== null) {
            $instance->errorCode = $errorCode;
        }

        return $instance;
    }
}
