<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class InterestsPref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'interestsPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var string[] */
    public array $tags = [];

    public static function id(): string
    {
        return self::ID;
    }
}
