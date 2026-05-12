<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\DeleteQueue;

/**
 * Delete a moderation queue. Optionally migrate reports to another queue.
 * procedure
 */
class DeleteQueue implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.queue.deleteQueue';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\DeleteQueue\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
