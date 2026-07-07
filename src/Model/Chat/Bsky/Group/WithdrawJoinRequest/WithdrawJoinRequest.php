<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\WithdrawJoinRequest;

/**
 * Withdraws a pending request to join a group. Action taken by the prospective member who originally requested to join.
 * procedure
 */
class WithdrawJoinRequest implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.withdrawJoinRequest';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(WithdrawJoinRequestInput $input): WithdrawJoinRequestOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\WithdrawJoinRequest\WithdrawJoinRequestOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(WithdrawJoinRequestInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
