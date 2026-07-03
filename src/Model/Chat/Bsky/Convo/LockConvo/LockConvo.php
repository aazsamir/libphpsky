<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\LockConvo;

/**
 * Locks a group convo so no more content (messages, reactions) can be added to it.
 * procedure
 */
class LockConvo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.lockConvo';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(LockConvoInput $input): LockConvoOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\LockConvo\LockConvoOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
