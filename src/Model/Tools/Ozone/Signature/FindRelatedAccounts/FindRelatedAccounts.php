<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts;

/**
 * Get accounts that share some matching threat signatures with the root account.
 * query
 */
class FindRelatedAccounts implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.signature.findRelatedAccounts';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $did, ?string $cursor = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\FindRelatedAccounts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
