<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateInviteCodes;

/**
 * object
 */
class AccountCodes implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'accountCodes';
    public const ID = 'com.atproto.server.createInviteCodes';

    public string $account;

    /** @var array<string> */
    public array $codes = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $codes
     */
    public static function new(string $account, array $codes): self
    {
        $instance = new self();
        $instance->account = $account;
        $instance->codes = $codes;

        return $instance;
    }
}
