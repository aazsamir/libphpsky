<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\SendInteractions;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.feed.sendInteractions';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\Interaction[] */
    public array $interactions = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\Interaction[] $interactions
     */
    public static function new(array $interactions): self
    {
        $instance = new self();
        $instance->interactions = $interactions;

        return $instance;
    }
}
