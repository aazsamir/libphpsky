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

    /** @var ?string if the actor blocks this DID, this is the AT-URI of the block record */
    public ?string $blocking;

    /** @var ?string if the actor is blocked by this DID, contains the AT-URI of the block record */
    public ?string $blockedBy;

    /** @var ?string if the actor blocks this DID via a block list, this is the AT-URI of the listblock record */
    public ?string $blockingByList;

    /** @var ?string if the actor is blocked by this DID via a block list, contains the AT-URI of the listblock record */
    public ?string $blockedByList;

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

    public static function new(
        string $did,
        ?string $following = null,
        ?string $followedBy = null,
        ?string $blocking = null,
        ?string $blockedBy = null,
        ?string $blockingByList = null,
        ?string $blockedByList = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        if ($following !== null) {
            $instance->following = $following;
        }
        if ($followedBy !== null) {
            $instance->followedBy = $followedBy;
        }
        if ($blocking !== null) {
            $instance->blocking = $blocking;
        }
        if ($blockedBy !== null) {
            $instance->blockedBy = $blockedBy;
        }
        if ($blockingByList !== null) {
            $instance->blockingByList = $blockingByList;
        }
        if ($blockedByList !== null) {
            $instance->blockedByList = $blockedByList;
        }

        return $instance;
    }
}
