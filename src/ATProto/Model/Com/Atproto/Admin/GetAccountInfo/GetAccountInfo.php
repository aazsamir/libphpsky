<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\GetAccountInfo;

/**
 * Get details about an account.
 * query
 */
class GetAccountInfo implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.getAccountInfo';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $did): \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\AccountView
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\AccountView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
