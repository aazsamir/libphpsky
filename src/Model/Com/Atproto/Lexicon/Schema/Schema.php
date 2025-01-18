<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Lexicon\Schema;

/**
 * object
 */
class Schema implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'com.atproto.lexicon.schema';

    public int $lexicon;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $lexicon): self
    {
        $instance = new self();
        $instance->lexicon = $lexicon;

        return $instance;
    }
}
