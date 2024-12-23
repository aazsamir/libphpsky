<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetFeedGenerator;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getFeedGenerator';

    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\GeneratorView $view = null;
    public bool $isOnline;
    public bool $isValid;

    public static function id(): string
    {
        return self::ID;
    }
}
