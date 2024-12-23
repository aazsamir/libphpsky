<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\SubscribeLabels;

/**
 * object
 */
class Info implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'info';
    public const ID = 'com.atproto.label.subscribeLabels';

    public string $name;
    public ?string $message = null;

    public static function id(): string
    {
        return self::ID;
    }
}
