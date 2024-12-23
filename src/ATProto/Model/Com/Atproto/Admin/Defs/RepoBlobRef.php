<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs;

/**
 * object
 */
class RepoBlobRef implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'repoBlobRef';
    public const ID = 'com.atproto.admin.defs';

    public string $did;
    public string $cid;
    public ?string $recordUri = null;

    public static function id(): string
    {
        return self::ID;
    }
}
