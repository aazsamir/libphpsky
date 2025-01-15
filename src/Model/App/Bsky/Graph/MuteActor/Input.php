<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\MuteActor;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.graph.muteActor';

    public string $actor;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $actor): self
    {
        $instance = new self();
        $instance->actor = $actor;

        return $instance;
    }
}
