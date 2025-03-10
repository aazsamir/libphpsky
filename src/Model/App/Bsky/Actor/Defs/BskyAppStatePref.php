<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * A grab bag of state that's specific to the bsky.app program. Third-party apps shouldn't use this.
 * object
 */
class BskyAppStatePref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'bskyAppStatePref';
    public const ID = 'app.bsky.actor.defs';

    public ?BskyAppProgressGuide $activeProgressGuide;

    /** @var ?array<string> An array of tokens which identify nudges (modals, popups, tours, highlight dots) that should be shown to the user. */
    public ?array $queuedNudges = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\Nux> Storage for NUXs the user has encountered. */
    public ?array $nuxs = [];

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
     * @param array<string> $queuedNudges
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\Nux> $nuxs
     */
    public static function new(
        ?BskyAppProgressGuide $activeProgressGuide = null,
        ?array $queuedNudges = [],
        ?array $nuxs = [],
    ): self {
        $instance = new self();
        if ($activeProgressGuide !== null) {
            $instance->activeProgressGuide = $activeProgressGuide;
        }
        if ($queuedNudges !== null) {
            $instance->queuedNudges = $queuedNudges;
        }
        if ($nuxs !== null) {
            $instance->nuxs = $nuxs;
        }

        return $instance;
    }
}
