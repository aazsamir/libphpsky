<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\QueryLabels;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.label.queryLabels';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public array $labels = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(array $labels, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->labels = $labels;
        $instance->cursor = $cursor;

        return $instance;
    }
}
