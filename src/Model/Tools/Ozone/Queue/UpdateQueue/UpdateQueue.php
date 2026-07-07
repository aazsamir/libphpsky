<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\UpdateQueue;

/**
 * Update queue properties. Currently only supports updating the name and enabled status to prevent configuration conflicts.
 * procedure
 */
class UpdateQueue implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.queue.updateQueue';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(UpdateQueueInput $input): UpdateQueueOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\UpdateQueue\UpdateQueueOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(UpdateQueueInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
