<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class SavedFeedsPref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'savedFeedsPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var string[] */
    public array $pinned = [];

    /** @var string[] */
    public array $saved = [];
    public ?int $timelineIndex = null;

    public static function id(): string
    {
        return self::ID;
    }
}
