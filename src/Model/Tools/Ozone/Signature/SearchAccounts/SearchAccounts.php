<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\SearchAccounts;

/**
 * Search for accounts that match one or more threat signature values.
 * query
 */
class SearchAccounts implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.signature.searchAccounts';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $values
     */
    public function query(array $values, ?string $cursor = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\SearchAccounts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
