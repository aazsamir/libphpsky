<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\GetSubjectStatus;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.admin.getSubjectStatus';

    public mixed $subject;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\StatusAttr $takedown = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\StatusAttr $deactivated = null;

    public static function id(): string
    {
        return self::ID;
    }
}
