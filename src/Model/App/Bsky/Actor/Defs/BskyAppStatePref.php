<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class BskyAppStatePref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'bskyAppStatePref';
    public const ID = 'app.bsky.actor.defs';

    public ?BskyAppProgressGuide $activeProgressGuide = null;

    /** @var array<string>|null */
    public ?array $queuedNudges = [];

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\Nux>|null */
    public ?array $nuxs = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $queuedNudges
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\Nux> $nuxs
     */
    public static function new(
        ?BskyAppProgressGuide $activeProgressGuide = null,
        ?array $queuedNudges = null,
        ?array $nuxs = null,
    ): self {
        $instance = new self();
        $instance->activeProgressGuide = $activeProgressGuide;
        $instance->queuedNudges = $queuedNudges;
        $instance->nuxs = $nuxs;

        return $instance;
    }
}
