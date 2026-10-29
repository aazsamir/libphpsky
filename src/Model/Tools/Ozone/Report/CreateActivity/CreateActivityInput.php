<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\CreateActivity;

/**
 * object
 */
class CreateActivityInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.report.createActivity';

    /** @var ?int ID of the report to record activity on. Exactly one of reportId or eventId must be provided. */
    public ?int $reportId;

    /** @var ?int ID of the report moderation event. Resolves to the report created from that event. Exactly one of reportId or eventId must be provided. */
    public ?int $eventId;

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\QueueActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\AssignmentActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\EscalationActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\CloseActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReopenActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\NoteActivity The type of activity to record. */
    public mixed $activity;

    /** @var ?string Optional moderator-only note. Not visible to reporters. */
    public ?string $internalNote;

    /** @var ?string Optional public-facing note, potentially visible to the reporter. */
    public ?string $publicNote;

    /** @var ?bool Set true when this activity is triggered by an automated process. Defaults to false. */
    public ?bool $isAutomated;
    public mixed $meta;

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
        return ['activity'];
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\QueueActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\AssignmentActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\EscalationActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\CloseActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReopenActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\NoteActivity $activity,
        ?int $reportId = null,
        ?int $eventId = null,
        ?string $internalNote = null,
        ?string $publicNote = null,
        ?bool $isAutomated = null,
        mixed $meta = null,
    ): self {
        $instance = new self();
        $instance->activity = $activity;
        if ($reportId !== null) {
            $instance->reportId = $reportId;
        }
        if ($eventId !== null) {
            $instance->eventId = $eventId;
        }
        if ($internalNote !== null) {
            $instance->internalNote = $internalNote;
        }
        if ($publicNote !== null) {
            $instance->publicNote = $publicNote;
        }
        if ($isAutomated !== null) {
            $instance->isAutomated = $isAutomated;
        }
        if ($meta !== null) {
            $instance->meta = $meta;
        }

        return $instance;
    }
}
