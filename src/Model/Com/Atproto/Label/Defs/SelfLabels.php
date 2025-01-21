<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * Metadata tags on an atproto record, published by the author within the record.
 * object
 */
class SelfLabels implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'selfLabels';
    public const ID = 'com.atproto.label.defs';

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabel> */
    public array $values = [];

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
        return ['values'];
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
