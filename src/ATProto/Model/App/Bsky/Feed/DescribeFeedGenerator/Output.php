<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\DescribeFeedGenerator;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.describeFeedGenerator';

    public string $did;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\DescribeFeedGenerator\Feed[] */
    public array $feeds = [];
    public ?Links $links = null;

    public static function id(): string
    {
        return self::ID;
    }
}
