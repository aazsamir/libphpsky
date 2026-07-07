<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\UpdateJoinRequestsRead;

/**
 * Marks all join requests as read for the group owner.
 * procedure
 */
class UpdateJoinRequestsRead implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.updateJoinRequestsRead';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(UpdateJoinRequestsReadInput $input): UpdateJoinRequestsReadOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\UpdateJoinRequestsRead\UpdateJoinRequestsReadOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(UpdateJoinRequestsReadInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
