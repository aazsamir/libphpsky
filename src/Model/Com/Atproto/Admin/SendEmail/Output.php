<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SendEmail;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.admin.sendEmail';

    public bool $sent;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(bool $sent): self
    {
        $instance = new self();
        $instance->sent = $sent;

        return $instance;
    }
}
