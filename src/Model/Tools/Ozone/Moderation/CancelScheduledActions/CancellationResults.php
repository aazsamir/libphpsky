<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\CancelScheduledActions;

/**
 * object
 */
class CancellationResults implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'cancellationResults';
    public const ID = 'tools.ozone.moderation.cancelScheduledActions';

    /** @var array<string> DIDs for which all pending scheduled actions were successfully cancelled */
    public array $succeeded = [];

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\CancelScheduledActions\FailedCancellation> DIDs for which cancellation failed with error details */
    public array $failed = [];

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
        return ['succeeded', 'failed'];
    }

    /**
     * @param array<string> $succeeded
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\CancelScheduledActions\FailedCancellation> $failed
     */
    public static function new(array $succeeded, array $failed): self
    {
        $instance = new self();
        $instance->succeeded = $succeeded;
        $instance->failed = $failed;

        return $instance;
    }
}
