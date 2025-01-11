<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Temp\CheckSignupQueue;

/**
 * Check accounts location in signup queue.
 * query
 */
class CheckSignupQueue implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.temp.checkSignupQueue';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Temp\CheckSignupQueue\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
