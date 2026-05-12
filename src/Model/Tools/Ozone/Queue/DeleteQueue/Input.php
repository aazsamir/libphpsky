<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\DeleteQueue;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.queue.deleteQueue';

    /** @var int ID of the queue to delete */
    public int $queueId;

    /** @var ?int Optional: migrate all reports to this queue. If not specified, reports will be set to unassigned (-1). */
    public ?int $migrateToQueueId;

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
        return ['queueId'];
    }

    public static function new(int $queueId, ?int $migrateToQueueId = null): self
    {
        $instance = new self();
        $instance->queueId = $queueId;
        if ($migrateToQueueId !== null) {
            $instance->migrateToQueueId = $migrateToQueueId;
        }

        return $instance;
    }
}
