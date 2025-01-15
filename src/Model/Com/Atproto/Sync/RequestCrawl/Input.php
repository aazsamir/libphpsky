<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\RequestCrawl;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.sync.requestCrawl';

    public string $hostname;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $hostname): self
    {
        $instance = new self();
        $instance->hostname = $hostname;

        return $instance;
    }
}