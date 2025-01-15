<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetCheckout;

/**
 * DEPRECATED - please use com.atproto.sync.getRepo instead
 * query
 */
class GetCheckout implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getCheckout';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $did): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
