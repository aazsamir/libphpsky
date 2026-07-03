<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\CreateQueue;

/**
 * Create a new moderation queue. Will fail if the queue configuration conflicts with an existing queue.
 * procedure
 */
class CreateQueue implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.queue.createQueue';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(CreateQueueInput $input): CreateQueueOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\CreateQueue\CreateQueueOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
