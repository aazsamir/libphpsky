<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadOtherV2;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getPostThreadOtherV2';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadOtherV2\ThreadItem> A flat list of other thread items. The depth of each item is indicated by the depth property inside the item. */
    public array $thread = [];

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
        return ['thread'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadOtherV2\ThreadItem> $thread
     */
    public static function new(array $thread): self
    {
        $instance = new self();
        $instance->thread = $thread;

        return $instance;
    }
}
