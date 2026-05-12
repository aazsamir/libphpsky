<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnlockConvo;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Unlocks a group convo so it is able to receive new content.
 * procedure
 */
class UnlockConvo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.unlockConvo';

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
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnlockConvo\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
