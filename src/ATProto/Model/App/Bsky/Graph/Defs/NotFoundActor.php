<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class NotFoundActor implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'notFoundActor';
    public const ID = 'app.bsky.graph.defs';

    public string $actor;
    public bool $notFound;

    public static function id(): string
    {
        return self::ID;
    }
}
