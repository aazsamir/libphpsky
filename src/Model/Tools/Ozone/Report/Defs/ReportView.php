<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs;

/**
 * object
 */
class ReportView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reportView';
    public const ID = 'tools.ozone.report.defs';

    /** @var int Report ID */
    public int $id;

    /** @var int ID of the moderation event that created this report */
    public int $eventId;

    /** @var string Current status of the report */
    public string $status;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectView The subject that was reported with full details */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectView $subject;

    /** @var ?string Type of report */
    public ?string $reportType;

    /** @var string DID of the user who made the report */
    public string $reportedBy;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectView Full subject view of the reporter account */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectView $reporter;

    /** @var ?string Comment provided by the reporter */
    public ?string $comment;

    /** @var \DateTimeInterface When the report was created */
    public \DateTimeInterface $createdAt;

    /** @var ?\DateTimeInterface When the report was last updated */
    public ?\DateTimeInterface $updatedAt;

    /** @var ?\DateTimeInterface When the report was assigned to its current queue */
    public ?\DateTimeInterface $queuedAt;

    /** @var ?array<int> Array of moderation event IDs representing actions taken on this report (sorted DESC, most recent first) */
    public ?array $actionEventIds = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventView> Optional: expanded action events */
    public ?array $actions = [];

    /** @var ?string Note sent to reporter when report was actioned */
    public ?string $actionNote;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectStatusView Current status of the reported subject */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectStatusView $subjectStatus;

    /** @var ?int Number of other pending reports on the same subject */
    public ?int $relatedReportCount;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportAssignment Information about moderator currently assigned to this report (if any) */
    public ?ReportAssignment $assignment;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueView The queue this report is assigned to (if any) */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueView $queue;

    /** @var ?bool Whether this report is muted. A report is muted if the reporter was muted or the subject was muted at the time the report was created. */
    public ?bool $isMuted;

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
        return ['id', 'eventId', 'status', 'subject', 'reportType', 'reportedBy', 'reporter', 'createdAt'];
    }

    /**
     * @param array<int> $actionEventIds
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventView> $actions
     */
    public static function new(
        int $id,
        int $eventId,
        string $status,
        string $reportedBy,
        \DateTimeInterface $createdAt,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectView $subject = null,
        ?string $reportType = null,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectView $reporter = null,
        ?string $comment = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $queuedAt = null,
        ?array $actionEventIds = [],
        ?array $actions = [],
        ?string $actionNote = null,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\SubjectStatusView $subjectStatus = null,
        ?int $relatedReportCount = null,
        ?ReportAssignment $assignment = null,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueView $queue = null,
        ?bool $isMuted = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->eventId = $eventId;
        $instance->status = $status;
        $instance->reportedBy = $reportedBy;
        $instance->createdAt = $createdAt;
        if ($subject !== null) {
            $instance->subject = $subject;
        }
        if ($reportType !== null) {
            $instance->reportType = $reportType;
        }
        if ($reporter !== null) {
            $instance->reporter = $reporter;
        }
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($updatedAt !== null) {
            $instance->updatedAt = $updatedAt;
        }
        if ($queuedAt !== null) {
            $instance->queuedAt = $queuedAt;
        }
        if ($actionEventIds !== null) {
            $instance->actionEventIds = $actionEventIds;
        }
        if ($actions !== null) {
            $instance->actions = $actions;
        }
        if ($actionNote !== null) {
            $instance->actionNote = $actionNote;
        }
        if ($subjectStatus !== null) {
            $instance->subjectStatus = $subjectStatus;
        }
        if ($relatedReportCount !== null) {
            $instance->relatedReportCount = $relatedReportCount;
        }
        if ($assignment !== null) {
            $instance->assignment = $assignment;
        }
        if ($queue !== null) {
            $instance->queue = $queue;
        }
        if ($isMuted !== null) {
            $instance->isMuted = $isMuted;
        }

        return $instance;
    }
}
