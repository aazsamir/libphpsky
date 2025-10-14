<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfo;

/**
 * Get details about an account.
 * query
 */
class GetAccountInfo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.getAccountInfo';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $did): \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\AccountView
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\AccountView::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(string $did): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
