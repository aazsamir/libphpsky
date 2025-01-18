<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class InterestsPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'interestsPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var array<string> */
    public array $tags = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $tags
     */
    public static function new(array $tags): self
    {
        $instance = new self();
        $instance->tags = $tags;

        return $instance;
    }
}
