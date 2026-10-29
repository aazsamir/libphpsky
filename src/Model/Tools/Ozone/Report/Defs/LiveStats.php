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

    /** @var ?int Number of unmuted reports currently not closed. */
    public ?int $pendingCount;

    /** @var ?int Unmuted pending reports past their closure target. */
    public ?int $closureTargetOverdueCount;

    /** @var ?int Reports whose closure meets their closure target. */
    public ?int $closureTargetMetCount;

    /** @var ?int Reports whose closure exceeds their closure target. */
    public ?int $closureTargetMissedCount;

    /** @var ?int Percent of reports meeting their closure target. */
    public ?int $closureTargetMetRate;

    /** @var ?int Number of close transitions. */
    public ?int $closedCount;

    /** @var ?int Number of closures whose last report action is label, tag, or takedown. */
    public ?int $actionedCount;

    /** @var ?int Number of closures whose last report action is not label, tag, or takedown. */
    public ?int $acknowledgedCount;

    /** @var ?int Number of reports escalated. */
    public ?int $escalatedCount;

    /** @var ?int Reports received. */
    public ?int $inboundCount;

    /** @var ?int Closures whose last report action is a label event. */
    public ?int $labelActionCount;

    /** @var ?int Closures whose last report action is a tag event. */
    public ?int $tagActionCount;

    /** @var ?int Closures whose last report action is a takedown event. */
    public ?int $takedownActionCount;

    /** @var ?int Sum of report assignment-to-close seconds. */
    public ?int $ahtDurationSec;

    /** @var ?int Number of assigned closed-report samples in ahtDurationSec. */
    public ?int $ahtSampleCount;

    /** @var ?int Sum of report creation-to-close seconds. */
    public ?int $resolutionDurationSec;

    /** @var ?int Number of closed-report samples in resolutionDurationSec. */
    public ?int $resolutionSampleCount;

    /** @var ?int Percentage of closures actioned (actionedCount / closedCount * 100), rounded to nearest integer. */
    public ?int $actionRate;

    /** @var ?int Average handling time in seconds from report assignment to close. */
    public ?int $avgHandlingTimeSec;

    /** @var ?int Average resolution time in seconds from report creation to close. */
    public ?int $avgResolutionTimeSec;

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
        ?\DateTimeInterface $lastUpdated = null,
    ): self {
        $instance = new self();
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
        if ($lastUpdated !== null) {
            $instance->lastUpdated = $lastUpdated;
        }

        return $instance;
    }
}
