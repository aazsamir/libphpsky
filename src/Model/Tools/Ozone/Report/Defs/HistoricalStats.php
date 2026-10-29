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

    /** @var ?int Number of unmuted reports not closed at the end of this UTC day, or at computation time for the current day. */
    public ?int $pendingCount;

    /** @var ?int Unmuted pending reports past their closure target at the snapshot time. */
    public ?int $closureTargetOverdueCount;

    /** @var ?int Reports whose closure meets their closure target. */
    public ?int $closureTargetMetCount;

    /** @var ?int Reports whose closure exceeds their closure target. */
    public ?int $closureTargetMissedCount;

    /** @var ?int Percent of reports meeting their closure target. */
    public ?int $closureTargetMetRate;

    /** @var ?int Number of close transitions during this day. */
    public ?int $closedCount;

    /** @var ?int Number of closures whose last report action is label, tag, or takedown during this day. */
    public ?int $actionedCount;

    /** @var ?int Number of closures whose last report action is not label, tag, or takedown during this day. */
    public ?int $acknowledgedCount;

    /** @var ?int Number of reports escalated during this day. */
    public ?int $escalatedCount;

    /** @var ?int Reports received during this day. */
    public ?int $inboundCount;

    /** @var ?int Closures whose last report action is a label event during this day. */
    public ?int $labelActionCount;

    /** @var ?int Closures whose last report action is a tag event during this day. */
    public ?int $tagActionCount;

    /** @var ?int Closures whose last report action is a takedown event during this day. */
    public ?int $takedownActionCount;

    /** @var ?int Sum of report assignment-to-close seconds for this day's samples. */
    public ?int $ahtDurationSec;

    /** @var ?int Number of assigned closed-report samples in ahtDurationSec. */
    public ?int $ahtSampleCount;

    /** @var ?int Sum of report creation-to-close seconds for this day's samples. */
    public ?int $resolutionDurationSec;

    /** @var ?int Number of closed-report samples in resolutionDurationSec. */
    public ?int $resolutionSampleCount;

    /** @var ?int Percentage of closures actioned (actionedCount / closedCount * 100), rounded to nearest integer. */
    public ?int $actionRate;

    /** @var ?int Average handling time in seconds from report assignment to close. */
    public ?int $avgHandlingTimeSec;

    /** @var ?int Average resolution time in seconds from report creation to close. */
    public ?int $avgResolutionTimeSec;

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
        ?int $closureTargetOverdueCount = null,
        ?int $closureTargetMetCount = null,
        ?int $closureTargetMissedCount = null,
        ?int $closureTargetMetRate = null,
        ?int $closedCount = null,
        ?int $actionedCount = null,
        ?int $acknowledgedCount = null,
        ?int $escalatedCount = null,
        ?int $inboundCount = null,
        ?int $labelActionCount = null,
        ?int $tagActionCount = null,
        ?int $takedownActionCount = null,
        ?int $ahtDurationSec = null,
        ?int $ahtSampleCount = null,
        ?int $resolutionDurationSec = null,
        ?int $resolutionSampleCount = null,
        ?int $actionRate = null,
        ?int $avgHandlingTimeSec = null,
        ?int $avgResolutionTimeSec = null,
    ): self {
        $instance = new self();
        $instance->date = $date;
        if ($computedAt !== null) {
            $instance->computedAt = $computedAt;
        }
        if ($pendingCount !== null) {
            $instance->pendingCount = $pendingCount;
        }
        if ($closureTargetOverdueCount !== null) {
            $instance->closureTargetOverdueCount = $closureTargetOverdueCount;
        }
        if ($closureTargetMetCount !== null) {
            $instance->closureTargetMetCount = $closureTargetMetCount;
        }
        if ($closureTargetMissedCount !== null) {
            $instance->closureTargetMissedCount = $closureTargetMissedCount;
        }
        if ($closureTargetMetRate !== null) {
            $instance->closureTargetMetRate = $closureTargetMetRate;
        }
        if ($closedCount !== null) {
            $instance->closedCount = $closedCount;
        }
        if ($actionedCount !== null) {
            $instance->actionedCount = $actionedCount;
        }
        if ($acknowledgedCount !== null) {
            $instance->acknowledgedCount = $acknowledgedCount;
        }
        if ($escalatedCount !== null) {
            $instance->escalatedCount = $escalatedCount;
        }
        if ($inboundCount !== null) {
            $instance->inboundCount = $inboundCount;
        }
        if ($labelActionCount !== null) {
            $instance->labelActionCount = $labelActionCount;
        }
        if ($tagActionCount !== null) {
            $instance->tagActionCount = $tagActionCount;
        }
        if ($takedownActionCount !== null) {
            $instance->takedownActionCount = $takedownActionCount;
        }
        if ($ahtDurationSec !== null) {
            $instance->ahtDurationSec = $ahtDurationSec;
        }
        if ($ahtSampleCount !== null) {
            $instance->ahtSampleCount = $ahtSampleCount;
        }
        if ($resolutionDurationSec !== null) {
            $instance->resolutionDurationSec = $resolutionDurationSec;
        }
        if ($resolutionSampleCount !== null) {
            $instance->resolutionSampleCount = $resolutionSampleCount;
        }
        if ($actionRate !== null) {
            $instance->actionRate = $actionRate;
        }
        if ($avgHandlingTimeSec !== null) {
            $instance->avgHandlingTimeSec = $avgHandlingTimeSec;
        }
        if ($avgResolutionTimeSec !== null) {
            $instance->avgResolutionTimeSec = $avgResolutionTimeSec;
        }

        return $instance;
    }
}
