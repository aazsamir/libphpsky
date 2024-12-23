<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\GetValues;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.set.getValues';

    public ?\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\Defs\SetView $set = null;

    /** @var string[] */
    public array $values = [];
    public ?string $cursor = null;

    public static function id(): string
    {
        return self::ID;
    }
}
