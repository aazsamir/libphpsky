<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\CreateQueue;

/**
 * Create a new moderation queue. A queue with omitted or empty subjectTypes or reportTypes must have reports assigned to it manually via (1) `modTool.meta.queueId` in `tools.ozone.moderation.emitEvent` or (2) `tools.ozone.report.reassignQueue`.
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

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(CreateQueueInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
