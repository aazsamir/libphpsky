<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteThread;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.graph.muteThread';

    public string $root;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $root): self
    {
        $instance = new self();
        $instance->root = $root;

        return $instance;
    }
}
