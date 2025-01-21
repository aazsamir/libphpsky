<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\NotifyOfUpdate;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.sync.notifyOfUpdate';

    /** @var string Hostname of the current service (usually a PDS) that is notifying of update. */
    public string $hostname;

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
        return ['hostname'];
    }

    public static function new(string $hostname): self
    {
        $instance = new self();
        $instance->hostname = $hostname;

        return $instance;
    }
}
