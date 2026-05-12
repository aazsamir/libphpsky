<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\CreateGroup;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.group.createGroup';

    /** @var array<string> */
    public array $members = [];
    public string $name;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['members', 'name'];
    }

    /**
     * @param array<string> $members
     */
    public static function new(array $members, string $name): self
    {
        $instance = new self();
        $instance->members = $members;
        $instance->name = $name;

        return $instance;
    }
}
