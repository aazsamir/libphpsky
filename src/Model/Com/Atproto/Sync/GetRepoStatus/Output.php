<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRepoStatus;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.sync.getRepoStatus';

    public string $did;
    public bool $active;
    public ?string $status;
    public ?string $rev;

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
        return ['did', 'active'];
    }

    public static function new(string $did, bool $active, ?string $status = null, ?string $rev = null): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->active = $active;
        if ($status !== null) {
            $instance->status = $status;
        }
        if ($rev !== null) {
            $instance->rev = $rev;
        }

        return $instance;
    }
}
