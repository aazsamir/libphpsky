<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\Defs;

/**
 * object
 */
class SetView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'setView';
    public const ID = 'tools.ozone.set.defs';

    public string $name;
    public ?string $description = null;
    public int $setSize;
    public string $createdAt;
    public string $updatedAt;

    public static function id(): string
    {
        return self::ID;
    }
}
