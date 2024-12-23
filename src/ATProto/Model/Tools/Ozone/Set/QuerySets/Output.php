<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\QuerySets;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.set.querySets';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\Defs\SetView[] */
    public array $sets = [];
    public ?string $cursor = null;

    public static function id(): string
    {
        return self::ID;
    }
}
