<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class SelfLabels implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'selfLabels';
    public const ID = 'com.atproto.label.defs';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\SelfLabel[] */
    public array $values = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\SelfLabel[] $values
     */
    public static function new(array $values): self
    {
        $instance = new self();
        $instance->values = $values;

        return $instance;
    }
}
