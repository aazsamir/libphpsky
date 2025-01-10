<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs;

/**
 * object
 */
class StatusAttr implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'statusAttr';
    public const ID = 'com.atproto.admin.defs';

    public bool $applied;
    public ?string $ref = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(bool $applied, ?string $ref = null): self
    {
        $instance = new self();
        $instance->applied = $applied;
        $instance->ref = $ref;

        return $instance;
    }
}
