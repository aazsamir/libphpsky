<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\SearchAccounts;

/**
 * Search for accounts that match one or more threat signature values.
 * query
 */
class SearchAccounts implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.signature.searchAccounts';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $values
     */
    function query(array $values, string $cursor, int $limit): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\SearchAccounts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
