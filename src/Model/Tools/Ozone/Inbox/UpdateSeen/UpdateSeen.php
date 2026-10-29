<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\UpdateSeen;

/**
 * procedure
 */
class UpdateSeen implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.updateSeen';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(UpdateSeenInput $input): UpdateSeenOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\UpdateSeen\UpdateSeenOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(UpdateSeenInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
