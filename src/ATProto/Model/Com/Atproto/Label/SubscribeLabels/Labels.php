<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\SubscribeLabels;

/**
 * object
 */
class Labels implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'labels';
    public const ID = 'com.atproto.label.subscribeLabels';

    public int $seq;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] */
    public array $labels = [];

    public static function id(): string
    {
        return self::ID;
    }
}
