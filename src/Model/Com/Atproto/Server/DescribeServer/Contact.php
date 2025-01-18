<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\DescribeServer;

/**
 * object
 */
class Contact implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'contact';
    public const ID = 'com.atproto.server.describeServer';

    public ?string $email;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $email = null): self
    {
        $instance = new self();
        $instance->email = $email;

        return $instance;
    }
}
