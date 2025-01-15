<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class SelfLabels implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'selfLabels';
    public const ID = 'com.atproto.label.defs';

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabel> */
    public array $values = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabel> $values
     */
    public static function new(array $values): self
    {
        $instance = new self();
        $instance->values = $values;

        return $instance;
    }
}
