<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class BskyAppStatePref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'bskyAppStatePref';
    public const ID = 'app.bsky.actor.defs';

    public ?BskyAppProgressGuide $activeProgressGuide = null;

    /** @var string[] */
    public ?array $queuedNudges = [];

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\Nux[] */
    public ?array $nuxs = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $queuedNudges
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\Nux[] $nuxs
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
