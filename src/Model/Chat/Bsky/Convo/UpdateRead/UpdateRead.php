<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead;

/**
 * procedure
 */
class UpdateRead implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.updateRead';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\UpdateRead\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
