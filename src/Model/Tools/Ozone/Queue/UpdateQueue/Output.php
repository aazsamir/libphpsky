<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\UpdateQueue;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.queue.updateQueue';

    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueView $queue;

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
        return ['queue'];
    }

    public static function new(?\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueView $queue = null): self
    {
        $instance = new self();
        if ($queue !== null) {
            $instance->queue = $queue;
        }

        return $instance;
    }
}
