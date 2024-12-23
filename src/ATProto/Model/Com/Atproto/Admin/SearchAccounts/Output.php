<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\SearchAccounts;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.admin.searchAccounts';

    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\AccountView[] */
    public array $accounts = [];

    public static function id(): string
    {
        return self::ID;
    }
}
