<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteThread;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.graph.unmuteThread';

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
