<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\SearchAccounts;

/**
 * Get list of accounts that matches your search query.
 * query
 */
class SearchAccounts implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.searchAccounts';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?string $email = null, ?string $cursor = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\SearchAccounts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
