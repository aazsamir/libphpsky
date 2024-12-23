<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateInviteCodes;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.createInviteCodes';

    public int $codeCount;
    public int $useCount;

    /** @var string[] */
    public ?array $forAccounts = [];

    public static function id(): string
    {
        return self::ID;
    }
}
