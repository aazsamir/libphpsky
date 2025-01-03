<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetQuotes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getQuotes';

    public string $uri;
    public ?string $cid = null;
    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\PostView[] */
    public array $posts = [];

    public static function id(): string
    {
        return self::ID;
    }
}
