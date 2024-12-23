<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\DescribeServer;

/**
 * object
 */
class Contact implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'contact';
    public const ID = 'com.atproto.server.describeServer';

    public ?string $email = null;

    public static function id(): string
    {
        return self::ID;
    }
}
