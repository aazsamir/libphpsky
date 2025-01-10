<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\NotifyOfUpdate;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.sync.notifyOfUpdate';

    public string $hostname;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $hostname): self
    {
        $instance = new self();
        $instance->hostname = $hostname;

        return $instance;
    }
}
