<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class LabelerPrefItem implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'labelerPrefItem';
    public const ID = 'app.bsky.actor.defs';

    public string $did;

    public static function id(): string
    {
        return self::ID;
    }
}
