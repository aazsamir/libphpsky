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

    /**
     * @param string[] $pinned
     * @param string[] $saved
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
