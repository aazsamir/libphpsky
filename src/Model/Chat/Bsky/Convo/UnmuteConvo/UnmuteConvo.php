<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnmuteConvo;

/**
 * procedure
 */
class UnmuteConvo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.unmuteConvo';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UnmuteConvo\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
