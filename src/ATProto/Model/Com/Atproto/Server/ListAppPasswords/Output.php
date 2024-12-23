<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\ListAppPasswords;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.listAppPasswords';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\ListAppPasswords\AppPassword[] */
    public array $passwords = [];

    public static function id(): string
    {
        return self::ID;
    }
}
