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
    public ?int $timelineIndex;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['pinned', 'saved'];
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
        if ($timelineIndex !== null) {
            $instance->timelineIndex = $timelineIndex;
        }

        return $instance;
    }
}
