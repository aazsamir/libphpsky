<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\LeaveConvo;

/**
 * Leaves a conversation (direct or group). For group, this effectively removes membership. For direct, membership is never removed, only changed to remove from enumerations by the user who left.
 * procedure
 */
class LeaveConvo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.leaveConvo';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(LeaveConvoInput $input): LeaveConvoOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\LeaveConvo\LeaveConvoOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(LeaveConvoInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
