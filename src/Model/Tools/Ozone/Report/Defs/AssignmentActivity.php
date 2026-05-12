<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs;

/**
 * Activity recording a moderator being assigned to a report.
 * object
 */
class AssignmentActivity implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'assignmentActivity';
    public const ID = 'tools.ozone.report.defs';

    /** @var ?string The report's status before this activity. Populated automatically from the report row; not required in input. */
    public ?string $previousStatus;

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

    public static function new(?string $previousStatus = null): self
    {
        $instance = new self();
        if ($previousStatus !== null) {
            $instance->previousStatus = $previousStatus;
        }

        return $instance;
    }
}
