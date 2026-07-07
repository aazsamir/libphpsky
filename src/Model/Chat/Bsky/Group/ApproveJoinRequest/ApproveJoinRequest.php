<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\ApproveJoinRequest;

/**
 * Approves a request to join a group (via join link) the user owns. Action taken by the group owner.
 * procedure
 */
class ApproveJoinRequest implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.approveJoinRequest';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(ApproveJoinRequestInput $input): ApproveJoinRequestOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\ApproveJoinRequest\ApproveJoinRequestOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(ApproveJoinRequestInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
