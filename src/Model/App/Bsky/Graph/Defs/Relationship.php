<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * lists the bi-directional graph relationships between one actor (not indicated in the object), and the target actors (the DID included in the object)
 * object
 */
class Relationship implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'relationship';
    public const ID = 'app.bsky.graph.defs';

    public string $did;

    /** @var ?string if the actor follows this DID, this is the AT-URI of the follow record */
    public ?string $following;

    /** @var ?string if the actor is followed by this DID, contains the AT-URI of the follow record */
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
