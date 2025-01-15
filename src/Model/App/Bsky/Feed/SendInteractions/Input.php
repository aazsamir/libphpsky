<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\SendInteractions;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.feed.sendInteractions';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\Interaction> */
    public array $interactions = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\Interaction> $interactions
     */
    public static function new(array $interactions): self
    {
        $instance = new self();
        $instance->interactions = $interactions;

        return $instance;
    }
}
