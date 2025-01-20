<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordsStats implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'recordsStats';
    public const ID = 'tools.ozone.moderation.defs';

    public ?int $totalReports;
    public ?int $reportedCount;
    public ?int $escalatedCount;
    public ?int $appealedCount;
    public ?int $subjectCount;
    public ?int $pendingCount;
    public ?int $processedCount;
    public ?int $takendownCount;

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
        ?int $totalReports = null,
        ?int $reportedCount = null,
        ?int $escalatedCount = null,
        ?int $appealedCount = null,
        ?int $subjectCount = null,
        ?int $pendingCount = null,
        ?int $processedCount = null,
        ?int $takendownCount = null,
    ): self {
        $instance = new self();
        if ($totalReports !== null) {
            $instance->totalReports = $totalReports;
        }
        if ($reportedCount !== null) {
            $instance->reportedCount = $reportedCount;
        }
        if ($escalatedCount !== null) {
            $instance->escalatedCount = $escalatedCount;
        }
        if ($appealedCount !== null) {
            $instance->appealedCount = $appealedCount;
        }
        if ($subjectCount !== null) {
            $instance->subjectCount = $subjectCount;
        }
        if ($pendingCount !== null) {
            $instance->pendingCount = $pendingCount;
        }
        if ($processedCount !== null) {
            $instance->processedCount = $processedCount;
        }
        if ($takendownCount !== null) {
            $instance->takendownCount = $takendownCount;
        }

        return $instance;
    }
}
