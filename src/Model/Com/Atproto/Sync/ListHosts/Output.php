<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListHosts;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.sync.listHosts';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListHosts\Host> Sort order is not formally specified. Recommended order is by time host was first seen by the server, with oldest first. */
    public array $hosts = [];

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
        return ['hosts'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListHosts\Host> $hosts
     */
    public static function new(array $hosts, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->hosts = $hosts;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
