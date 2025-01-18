<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Set\Defs;

/**
 * object
 */
class SetView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'setView';
    public const ID = 'tools.ozone.set.defs';

    public string $name;
    public ?string $description = null;
    public int $setSize;
    public \DateTimeInterface $createdAt;
    public \DateTimeInterface $updatedAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $name,
        int $setSize,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
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
