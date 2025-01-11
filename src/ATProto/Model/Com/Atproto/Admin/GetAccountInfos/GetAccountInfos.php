<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\GetAccountInfos;

/**
 * Get details about some accounts.
 * query
 */
class GetAccountInfos implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.getAccountInfos';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $dids
     */
    function query(array $dids): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\GetAccountInfos\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
