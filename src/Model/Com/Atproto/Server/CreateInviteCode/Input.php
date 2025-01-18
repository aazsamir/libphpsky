<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateInviteCode;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.createInviteCode';

    public int $useCount;
    public ?string $forAccount;

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
