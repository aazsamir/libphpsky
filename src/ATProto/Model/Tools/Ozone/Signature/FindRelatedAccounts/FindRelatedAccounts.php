<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\FindRelatedAccounts;

/**
 * Get accounts that share some matching threat signatures with the root account.
 * query
 */
class FindRelatedAccounts implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.signature.findRelatedAccounts';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $did, string $cursor, int $limit): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\FindRelatedAccounts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
