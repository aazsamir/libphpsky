<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\DescribeFeedGenerator;

/**
 * object
 */
class Links implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'links';
    public const ID = 'app.bsky.feed.describeFeedGenerator';

    public ?string $privacyPolicy = null;
    public ?string $termsOfService = null;

    public static function id(): string
    {
        return self::ID;
    }
}
