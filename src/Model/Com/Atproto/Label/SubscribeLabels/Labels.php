<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\SubscribeLabels;

/**
 * object
 */
class Labels implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labels';
    public const ID = 'com.atproto.label.subscribeLabels';

    public int $seq;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public array $labels = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(int $seq, array $labels): self
    {
        $instance = new self();
        $instance->seq = $seq;
        $instance->labels = $labels;

        return $instance;
    }
}
