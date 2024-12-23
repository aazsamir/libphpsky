<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class Relationship implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'relationship';
    public const ID = 'app.bsky.graph.defs';

    public string $did;
    public ?string $following = null;
    public ?string $followedBy = null;

    public static function id(): string
    {
        return self::ID;
    }
}
