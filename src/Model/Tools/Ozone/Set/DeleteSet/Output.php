<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteSet;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.set.deleteSet';

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(): self
    {
        $instance = new self();

        return $instance;
    }
}
