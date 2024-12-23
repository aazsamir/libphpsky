<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordEvent implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'recordEvent';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public string $op;
    public ?string $cid = null;
    public string $timestamp;

    public static function id(): string
    {
        return self::ID;
    }
}
