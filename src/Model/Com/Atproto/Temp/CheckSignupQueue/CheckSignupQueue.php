<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckSignupQueue;

/**
 * Check accounts location in signup queue.
 * query
 */
class CheckSignupQueue implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.temp.checkSignupQueue';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\CheckSignupQueue\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}