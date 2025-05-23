<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\RequestCrawl;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.sync.requestCrawl';

    /** @var string Hostname of the current service (eg, PDS) that is requesting to be crawled. */
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
