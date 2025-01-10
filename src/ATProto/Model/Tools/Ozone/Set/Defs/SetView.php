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

    public static function new(
        string $name,
        int $setSize,
        string $createdAt,
        string $updatedAt,
        ?string $description = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->setSize = $setSize;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        $instance->description = $description;

        return $instance;
    }
}
