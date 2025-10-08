<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ScheduleAction;

/**
 * object
 */
class FailedScheduling implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'failedScheduling';
    public const ID = 'tools.ozone.moderation.scheduleAction';

    public string $subject;
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
        return ['subject', 'error'];
    }

    public static function new(string $subject, string $error, ?string $errorCode = null): self
    {
        $instance = new self();
        $instance->subject = $subject;
        $instance->error = $error;
        if ($errorCode !== null) {
            $instance->errorCode = $errorCode;
        }

        return $instance;
    }
}
