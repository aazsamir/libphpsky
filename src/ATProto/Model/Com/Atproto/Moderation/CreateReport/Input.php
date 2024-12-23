<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Moderation\CreateReport;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.moderation.createReport';

    public string $reasonType;
    public ?string $reason = null;
    public mixed $subject;

    public static function id(): string
    {
        return self::ID;
    }
}
