<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * Preferences for live events.
 * object
 */
class LiveEventPreferences implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'liveEventPreferences';
    public const ID = 'app.bsky.actor.defs';

    /** @var ?array<string> A list of feed IDs that the user has hidden from live events. */
    public ?array $hiddenFeedIds = [];

    /** @var ?bool Whether to hide all feeds from live events. */
    public ?bool $hideAllFeeds;

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
        return [];
    }

    /**
     * @param array<string> $hiddenFeedIds
     */
    public static function new(?array $hiddenFeedIds = [], ?bool $hideAllFeeds = null): self
    {
        $instance = new self();
        if ($hiddenFeedIds !== null) {
            $instance->hiddenFeedIds = $hiddenFeedIds;
        }
        if ($hideAllFeeds !== null) {
            $instance->hideAllFeeds = $hideAllFeeds;
        }

        return $instance;
    }
}
