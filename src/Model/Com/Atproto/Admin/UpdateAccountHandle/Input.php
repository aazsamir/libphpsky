<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountHandle;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.updateAccountHandle';

    public string $did;
    public string $handle;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $did, string $handle): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;

        return $instance;
    }
}
