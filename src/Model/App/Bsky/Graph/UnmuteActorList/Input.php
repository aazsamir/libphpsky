<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\UnmuteActorList;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.graph.unmuteActorList';

    public string $list;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $list): self
    {
        $instance = new self();
        $instance->list = $list;

        return $instance;
    }
}
