<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs;

/**
 * A single daily snapshot of report statistics for a calendar date.
 * object
 */
class HistoricalStats implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'historicalStats';
    public const ID = 'tools.ozone.report.defs';

    /** @var string The calendar date this snapshot covers (YYYY-MM-DD). */
    public string $date;

    /** @var ?\DateTimeInterface When this snapshot was last computed. */
    public ?\DateTimeInterface $computedAt;

    /** @var ?int Number of reports not closed at time of computation. */
    public ?int $pendingCount;

    /** @var ?int Number of reports closed during this day. */
    public ?int $actionedCount;

    /** @var ?int Number of reports escalated during this day. */
    public ?int $escalatedCount;

    /** @var ?int Reports received during this day. */
    public ?int $inboundCount;

    /** @var ?int Percentage of reports actioned (actionedCount / inboundCount * 100), rounded to nearest integer. */
    public ?int $actionRate;

    /** @var ?int Average time in seconds from report creation (or moderator assignment) to close. */
    public ?int $avgHandlingTimeSec;

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
        return ['date'];
    }

    public static function new(
        string $date,
        ?\DateTimeInterface $computedAt = null,
        ?int $pendingCount = null,
        ?int $actionedCount = null,
        ?int $escalatedCount = null,
        ?int $inboundCount = null,
        ?int $actionRate = null,
        ?int $avgHandlingTimeSec = null,
    ): self {
        $instance = new self();
        $instance->date = $date;
        if ($computedAt !== null) {
            $instance->computedAt = $computedAt;
        }
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

        return $instance;
    }
}
