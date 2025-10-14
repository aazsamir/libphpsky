<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SearchAccounts;

/**
 * Get list of accounts that matches your search query.
 * query
 */
class SearchAccounts implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.searchAccounts';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(?string $email = null, ?string $cursor = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SearchAccounts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(?string $email = null, ?string $cursor = null, ?int $limit = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
