<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\UnassignModerator;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.queue.unassignModerator';

    /** @var int The ID of the queue to unassign the user from. */
    public int $queueId;

    /** @var string DID to be unassigned. */
    public string $did;

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
        return ['queueId', 'did'];
    }

    public static function new(int $queueId, string $did): self
    {
        $instance = new self();
        $instance->queueId = $queueId;
        $instance->did = $did;

        return $instance;
    }
}
