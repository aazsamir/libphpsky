<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\MuteConvo;

/**
 * procedure
 */
class MuteConvo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.muteConvo';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\MuteConvo\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
