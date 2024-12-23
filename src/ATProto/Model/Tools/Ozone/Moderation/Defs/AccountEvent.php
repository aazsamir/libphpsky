<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class AccountEvent implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'accountEvent';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public bool $active;
    public ?string $status = null;
    public string $timestamp;

    public static function id(): string
    {
        return self::ID;
    }
}
