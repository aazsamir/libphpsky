<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class Interaction implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'interaction';
    public const ID = 'app.bsky.feed.defs';

    public ?string $item = null;
    public ?string $event = null;
    public ?string $feedContext = null;

    public static function id(): string
    {
        return self::ID;
    }
}
