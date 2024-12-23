<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class Label implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'label';
    public const ID = 'com.atproto.label.defs';

    public ?int $ver = null;
    public string $src;
    public string $uri;
    public ?string $cid = null;
    public string $val;
    public ?bool $neg = null;
    public string $cts;
    public ?string $exp = null;
    public ?string $sig = null;

    public static function id(): string
    {
        return self::ID;
    }
}
