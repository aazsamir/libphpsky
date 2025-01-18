<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\SubscribeLabels;

/**
 * object
 */
class Info implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'info';
    public const ID = 'com.atproto.label.subscribeLabels';

    public string $name;
    public ?string $message = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $name, ?string $message = null): self
    {
        $instance = new self();
        $instance->name = $name;
        $instance->message = $message;

        return $instance;
    }
}
