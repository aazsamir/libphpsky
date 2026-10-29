<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs;

/**
 * Activity recording a moderator being unassigned from a report.
 * object
 */
class UnassignmentActivity implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'unassignmentActivity';
    public const ID = 'tools.ozone.report.defs';

    /** @var ?string The report's status immediately before the moderator was unassigned. May be absent on older activities. */
    public ?string $previousStatus;

    /** @var ?string The report's status immediately after the moderator was unassigned. May equal previousStatus if unassignment did not change the report's status, or be absent on older activities. */
    public ?string $nextStatus;

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
        return [];
    }

    public static function new(?string $previousStatus = null, ?string $nextStatus = null): self
    {
        $instance = new self();
        if ($previousStatus !== null) {
            $instance->previousStatus = $previousStatus;
        }
        if ($nextStatus !== null) {
            $instance->nextStatus = $nextStatus;
        }

        return $instance;
    }
}
