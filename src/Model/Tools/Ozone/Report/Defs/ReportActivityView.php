<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs;

/**
 * A single activity entry on a report.
 * object
 */
class ReportActivityView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reportActivityView';
    public const ID = 'tools.ozone.report.defs';

    /** @var int Activity ID */
    public int $id;

    /** @var int ID of the report this activity belongs to */
    public int $reportId;

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\QueueActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\AssignmentActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\EscalationActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\CloseActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReopenActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\NoteActivity The typed activity object describing what occurred. */
    public mixed $activity;

    /** @var ?string Optional moderator-only note. Not visible to reporters. */
    public ?string $internalNote;

    /** @var ?string Optional public note, potentially visible to the reporter. */
    public ?string $publicNote;
    public mixed $meta;

    /** @var bool True if this activity was created by an automated process (e.g. queue router) rather than a direct human action. */
    public bool $isAutomated;

    /** @var string DID of the actor who created this activity, or the service DID for automated activities. */
    public string $createdBy;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member Full member record of the moderator who created this activity */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member $moderator;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportView Full view of the report this activity belongs to. */
    public ?ReportView $report;

    /** @var \DateTimeInterface When this activity was created */
    public \DateTimeInterface $createdAt;

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
        return ['id', 'reportId', 'activity', 'isAutomated', 'createdBy', 'createdAt'];
    }

    public static function new(
        int $id,
        int $reportId,
        QueueActivity|AssignmentActivity|EscalationActivity|CloseActivity|ReopenActivity|NoteActivity $activity,
        bool $isAutomated,
        string $createdBy,
        \DateTimeInterface $createdAt,
        ?string $internalNote = null,
        ?string $publicNote = null,
        mixed $meta = null,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member $moderator = null,
        ?ReportView $report = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->reportId = $reportId;
        $instance->activity = $activity;
        $instance->isAutomated = $isAutomated;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;
        if ($internalNote !== null) {
            $instance->internalNote = $internalNote;
        }
        if ($publicNote !== null) {
            $instance->publicNote = $publicNote;
        }
        if ($meta !== null) {
            $instance->meta = $meta;
        }
        if ($moderator !== null) {
            $instance->moderator = $moderator;
        }
        if ($report !== null) {
            $instance->report = $report;
        }

        return $instance;
    }
}
