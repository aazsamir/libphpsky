<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * Metadata tag on an atproto record, published by the author within the record. Note that schemas should use #selfLabels, not #selfLabel.
 * object
 */
class SelfLabel implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'selfLabel';
    public const ID = 'com.atproto.label.defs';

    /** @var string The short string name of the value or type of this label. */
    public string $val;

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
        return ['val'];
    }

    public static function new(string $val): self
    {
        $instance = new self();
        $instance->val = $val;

        return $instance;
    }
}
