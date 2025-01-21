<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.repo.applyWrites';

    /** @var string The handle or DID of the repo (aka, current account). */
    public string $repo;

    /** @var ?bool Can be set to 'false' to skip Lexicon schema validation of record data across all operations, 'true' to require it, or leave unset to validate only for known Lexicons. */
    public ?bool $validate;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Create|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Update|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Delete> */
    public array $writes = [];

    /** @var ?string If provided, the entire operation will fail if the current repo commit CID does not match this value. Used to prevent conflicting repo mutations. */
    public ?string $swapCommit;

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
        return ['repo', 'writes'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Create|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Update|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\Delete> $writes
     */
    public static function new(string $repo, array $writes, ?bool $validate = null, ?string $swapCommit = null): self
    {
        $instance = new self();
        $instance->repo = $repo;
        $instance->writes = $writes;
        if ($validate !== null) {
            $instance->validate = $validate;
        }
        if ($swapCommit !== null) {
            $instance->swapCommit = $swapCommit;
        }

        return $instance;
    }
}
