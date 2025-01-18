<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Set\QuerySets;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.set.querySets';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Set\Defs\SetView> */
    public array $sets = [];
    public ?string $cursor;

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
        return ['sets'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Set\Defs\SetView> $sets
     */
    public static function new(array $sets, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->sets = $sets;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
