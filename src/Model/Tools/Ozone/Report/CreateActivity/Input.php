<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\CreateActivity;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.report.createActivity';

    /** @var int ID of the report to record activity on */
    public int $reportId;

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\QueueActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\AssignmentActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\EscalationActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\CloseActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReopenActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\NoteActivity The type of activity to record. */
    public mixed $activity;

    /** @var ?string Optional moderator-only note. Not visible to reporters. */
    public ?string $internalNote;

    /** @var ?string Optional public-facing note, potentially visible to the reporter. */
    public ?string $publicNote;

    /** @var ?bool Set true when this activity is triggered by an automated process. Defaults to false. */
    public ?bool $isAutomated;

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
        return ['reportId', 'activity'];
    }

    public static function new(
        int $reportId,
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\QueueActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\AssignmentActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\EscalationActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\CloseActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReopenActivity|\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\NoteActivity $activity,
        ?string $internalNote = null,
        ?string $publicNote = null,
        ?bool $isAutomated = null,
    ): self {
        $instance = new self();
        $instance->reportId = $reportId;
        $instance->activity = $activity;
        if ($internalNote !== null) {
            $instance->internalNote = $internalNote;
        }
        if ($publicNote !== null) {
            $instance->publicNote = $publicNote;
        }
        if ($isAutomated !== null) {
            $instance->isAutomated = $isAutomated;
        }

        return $instance;
    }
}
