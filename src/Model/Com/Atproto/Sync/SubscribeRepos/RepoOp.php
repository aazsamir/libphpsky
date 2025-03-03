<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * A repo operation, ie a mutation of a single record.
 * object
 */
class RepoOp implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'repoOp';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public string $action;
    public string $path;

    /** @var ?string For creates and updates, the new record CID. For deletions, null. */
    public ?string $cid = null;

    /** @var ?string For updates and deletes, the previous record CID (required for inductive firehose). For creations, field should not be defined. */
    public ?string $prev;

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
        return ['cid'];
    }

    public static function required(): array
    {
        return ['action', 'path', 'cid'];
    }

    public static function new(string $action, string $path, ?string $cid = null, ?string $prev = null): self
    {
        $instance = new self();
        $instance->action = $action;
        $instance->path = $path;
        $instance->cid = $cid;
        if ($prev !== null) {
            $instance->prev = $prev;
        }

        return $instance;
    }
}
