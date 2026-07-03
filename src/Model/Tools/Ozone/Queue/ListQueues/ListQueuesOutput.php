<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\ListQueues;

/**
 * object
 */
class ListQueuesOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.queue.listQueues';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueView> */
    public array $queues = [];

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
        return ['queues'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueView> $queues
     */
    public static function new(array $queues, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->queues = $queues;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
