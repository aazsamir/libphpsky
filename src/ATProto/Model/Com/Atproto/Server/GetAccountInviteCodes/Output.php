<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\GetAccountInviteCodes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.getAccountInviteCodes';

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode> */
    public array $codes = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode> $codes
     */
    public static function new(array $codes): self
    {
        $instance = new self();
        $instance->codes = $codes;

        return $instance;
    }
}
