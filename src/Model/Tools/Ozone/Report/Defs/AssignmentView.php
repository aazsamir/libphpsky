<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs;

/**
 * object
 */
class AssignmentView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'assignmentView';
    public const ID = 'tools.ozone.report.defs';

    public int $id;
    public string $did;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member The moderator assigned to this report */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member $moderator;
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueView $queue;
    public int $reportId;
    public \DateTimeInterface $startAt;
    public ?\DateTimeInterface $endAt;

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
        return ['id', 'did', 'reportId', 'startAt'];
    }

    public static function new(
        int $id,
        string $did,
        int $reportId,
        \DateTimeInterface $startAt,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member $moderator = null,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueView $queue = null,
        ?\DateTimeInterface $endAt = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->did = $did;
        $instance->reportId = $reportId;
        $instance->startAt = $startAt;
        if ($moderator !== null) {
            $instance->moderator = $moderator;
        }
        if ($queue !== null) {
            $instance->queue = $queue;
        }
        if ($endAt !== null) {
            $instance->endAt = $endAt;
        }

        return $instance;
    }
}
