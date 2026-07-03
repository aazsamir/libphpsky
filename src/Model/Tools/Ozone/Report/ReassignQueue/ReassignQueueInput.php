<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\ReassignQueue;

/**
 * object
 */
class ReassignQueueInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.report.reassignQueue';

    /** @var int ID of the report to reassign */
    public int $reportId;

    /** @var int Target queue ID. Use -1 to unassign from any queue. */
    public int $queueId;

    /** @var ?string Optional moderator-only note recorded on the resulting queueActivity as internalNote. */
    public ?string $comment;

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
        return ['reportId', 'queueId'];
    }

    public static function new(int $reportId, int $queueId, ?string $comment = null): self
    {
        $instance = new self();
        $instance->reportId = $reportId;
        $instance->queueId = $queueId;
        if ($comment !== null) {
            $instance->comment = $comment;
        }

        return $instance;
    }
}
