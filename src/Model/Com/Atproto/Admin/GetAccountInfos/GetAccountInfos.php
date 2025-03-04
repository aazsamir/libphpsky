<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfos;

/**
 * Get details about some accounts.
 * query
 */
class GetAccountInfos implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.getAccountInfos';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $dids
     */
    public function query(array $dids): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\GetAccountInfos\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param array<string> $dids
     * @return array<string, mixed>
     */
    public function rawQuery(array $dids): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
