<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class Relationship implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'relationship';
    public const ID = 'app.bsky.graph.defs';

    public string $did;
    public ?string $following;
    public ?string $followedBy;

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
        return ['did'];
    }

    public static function new(string $did, ?string $following = null, ?string $followedBy = null): self
    {
        $instance = new self();
        $instance->did = $did;
        if ($following !== null) {
            $instance->following = $following;
        }
        if ($followedBy !== null) {
            $instance->followedBy = $followedBy;
        }

        return $instance;
    }
}
