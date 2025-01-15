<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate;

/**
 * object
 */
class ListRule implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'listRule';
    public const ID = 'app.bsky.feed.threadgate';

    public string $list;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $list): self
    {
        $instance = new self();
        $instance->list = $list;

        return $instance;
    }
}
