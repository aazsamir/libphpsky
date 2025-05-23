<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs;

/**
 * object
 */
class StatusAttr implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'statusAttr';
    public const ID = 'com.atproto.admin.defs';

    public bool $applied;
    public ?string $ref;

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
        return ['applied'];
    }

    public static function new(bool $applied, ?string $ref = null): self
    {
        $instance = new self();
        $instance->applied = $applied;
        if ($ref !== null) {
            $instance->ref = $ref;
        }

        return $instance;
    }
}
