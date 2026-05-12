<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs;

/**
 * Live statistics for reports for the current calendar day, filterable by queue, moderator, or report type.
 * object
 */
class LiveStats implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'liveStats';
    public const ID = 'tools.ozone.report.defs';

    /** @var ?int Number of reports currently not closed. */
    public ?int $pendingCount;

    /** @var ?int Number of reports closed today. */
    public ?int $actionedCount;

    /** @var ?int Number of reports escalated today. */
    public ?int $escalatedCount;

    /** @var ?int Reports received today. */
    public ?int $inboundCount;

    /** @var ?int Percentage of reports actioned (actionedCount / inboundCount * 100), rounded to nearest integer. */
    public ?int $actionRate;

    /** @var ?int Average time in seconds from report creation (or moderator assignment) to close. */
    public ?int $avgHandlingTimeSec;

    /** @var ?\DateTimeInterface When these statistics were last computed. */
    public ?\DateTimeInterface $lastUpdated;

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

    public static function new(
        ?int $pendingCount = null,
        ?int $actionedCount = null,
        ?int $escalatedCount = null,
        ?int $inboundCount = null,
        ?int $actionRate = null,
        ?int $avgHandlingTimeSec = null,
        ?\DateTimeInterface $lastUpdated = null,
    ): self {
        $instance = new self();
        if ($pendingCount !== null) {
            $instance->pendingCount = $pendingCount;
        }
        if ($actionedCount !== null) {
            $instance->actionedCount = $actionedCount;
        }
        if ($escalatedCount !== null) {
            $instance->escalatedCount = $escalatedCount;
        }
        if ($inboundCount !== null) {
            $instance->inboundCount = $inboundCount;
        }
        if ($actionRate !== null) {
            $instance->actionRate = $actionRate;
        }
        if ($avgHandlingTimeSec !== null) {
            $instance->avgHandlingTimeSec = $avgHandlingTimeSec;
        }
        if ($lastUpdated !== null) {
            $instance->lastUpdated = $lastUpdated;
        }

        return $instance;
    }
}
