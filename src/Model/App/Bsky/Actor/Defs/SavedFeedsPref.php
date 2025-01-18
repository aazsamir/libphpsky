<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class SavedFeedsPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'savedFeedsPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var array<string> */
    public array $pinned = [];

    /** @var array<string> */
    public array $saved = [];
    public ?int $timelineIndex = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $pinned
     * @param array<string> $saved
     */
    public static function new(array $pinned, array $saved, ?int $timelineIndex = null): self
    {
        $instance = new self();
        $instance->pinned = $pinned;
        $instance->saved = $saved;
        $instance->timelineIndex = $timelineIndex;

        return $instance;
    }
}
