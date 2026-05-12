<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs;

/**
 * object
 */
class AssignmentView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'assignmentView';
    public const ID = 'tools.ozone.queue.defs';

    public int $id;
    public string $did;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member The moderator assigned to this queue */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member $moderator;
    public ?QueueView $queue;
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
        return ['id', 'did', 'queue', 'startAt'];
    }

    public static function new(
        int $id,
        string $did,
        \DateTimeInterface $startAt,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member $moderator = null,
        ?QueueView $queue = null,
        ?\DateTimeInterface $endAt = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->did = $did;
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
