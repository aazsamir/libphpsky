<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\ListAppPasswords;

/**
 * object
 */
class AppPassword implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'appPassword';
    public const ID = 'com.atproto.server.listAppPasswords';

    public string $name;
    public string $createdAt;
    public ?bool $privileged = null;

    public static function id(): string
    {
        return self::ID;
    }
}
