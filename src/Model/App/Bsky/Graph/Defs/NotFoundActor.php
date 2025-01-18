<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class NotFoundActor implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'notFoundActor';
    public const ID = 'app.bsky.graph.defs';

    public string $actor;
    public bool $notFound;

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
        return ['actor', 'notFound'];
    }

    public static function new(string $actor, bool $notFound): self
    {
        $instance = new self();
        $instance->actor = $actor;
        $instance->notFound = $notFound;

        return $instance;
    }
}
