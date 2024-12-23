<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class SavedFeedsPrefV2 implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'savedFeedsPrefV2';
    public const ID = 'app.bsky.actor.defs';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\SavedFeed[] */
    public array $items = [];

    public static function id(): string
    {
        return self::ID;
    }
}
