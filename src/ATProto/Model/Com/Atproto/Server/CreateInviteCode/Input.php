<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateInviteCode;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.createInviteCode';

    public int $useCount;
    public ?string $forAccount = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $useCount, ?string $forAccount = null): self
    {
        $instance = new self();
        $instance->useCount = $useCount;
        $instance->forAccount = $forAccount;

        return $instance;
    }
}
