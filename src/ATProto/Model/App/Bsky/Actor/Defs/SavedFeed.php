<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class SavedFeed implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'savedFeed';
    public const ID = 'app.bsky.actor.defs';

    public string $id;
    public string $type;
    public string $value;
    public bool $pinned;

    public static function id(): string
    {
        return self::ID;
    }
}
