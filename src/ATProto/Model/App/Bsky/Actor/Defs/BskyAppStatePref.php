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
}
