<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ReporterStats implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reporterStats';
    public const ID = 'tools.ozone.moderation.defs';

    public string $did;

    /** @var int The total number of reports made by the user on accounts. */
    public int $accountReportCount;

    /** @var int The total number of reports made by the user on records. */
    public int $recordReportCount;

    /** @var int The total number of accounts reported by the user. */
    public int $reportedAccountCount;

    /** @var int The total number of records reported by the user. */
    public int $reportedRecordCount;

    /** @var int The total number of accounts taken down as a result of the user's reports. */
    public int $takendownAccountCount;

    /** @var int The total number of records taken down as a result of the user's reports. */
    public int $takendownRecordCount;

    /** @var int The total number of accounts labeled as a result of the user's reports. */
    public int $labeledAccountCount;

    /** @var int The total number of records labeled as a result of the user's reports. */
    public int $labeledRecordCount;

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
        return ['did', 'accountReportCount', 'recordReportCount', 'reportedAccountCount', 'reportedRecordCount', 'takendownAccountCount', 'takendownRecordCount', 'labeledAccountCount', 'labeledRecordCount'];
    }

    public static function new(
        string $did,
        int $accountReportCount,
        int $recordReportCount,
        int $reportedAccountCount,
        int $reportedRecordCount,
        int $takendownAccountCount,
        int $takendownRecordCount,
        int $labeledAccountCount,
        int $labeledRecordCount,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->accountReportCount = $accountReportCount;
        $instance->recordReportCount = $recordReportCount;
        $instance->reportedAccountCount = $reportedAccountCount;
        $instance->reportedRecordCount = $reportedRecordCount;
        $instance->takendownAccountCount = $takendownAccountCount;
        $instance->takendownRecordCount = $takendownRecordCount;
        $instance->labeledAccountCount = $labeledAccountCount;
        $instance->labeledRecordCount = $labeledRecordCount;

        return $instance;
    }
}
