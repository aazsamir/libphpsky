<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs;

/**
 * object
 */
class QueueStats implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'queueStats';
    public const ID = 'tools.ozone.queue.defs';

    /** @var ?int Number of reports in 'open' status */
    public ?int $pendingCount;

    /** @var ?int Number of reports in 'closed' status */
    public ?int $actionedCount;

    /** @var ?int Number of reports in 'escalated' status */
    public ?int $escalatedCount;

    /** @var ?int Reports received in this queue in the last 24 hours. */
    public ?int $inboundCount;

    /** @var ?int Percentage of reports actioned (actionedCount / inboundCount * 100), rounded to nearest integer. Absent when inboundCount is 0. */
    public ?int $actionRate;

    /** @var ?int Average time in seconds from report creation to close, for reports closed in this period. */
    public ?int $avgHandlingTimeSec;

    /** @var ?\DateTimeInterface When these statistics were last computed */
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
