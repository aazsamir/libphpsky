<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.repo.createRecord';

    /** @var string The handle or DID of the repo (aka, current account). */
    public string $repo;

    /** @var string The NSID of the record collection. */
    public string $collection;

    /** @var ?string The Record Key. */
    public ?string $rkey;

    /** @var ?bool Can be set to 'false' to skip Lexicon schema validation of record data, 'true' to require it, or leave unset to validate only for known Lexicons. */
    public ?bool $validate;
    public mixed $record;

    /** @var ?string Compare and swap with the previous commit by CID. */
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
        return ['repo', 'collection', 'record'];
    }

    public static function new(
        string $repo,
        string $collection,
        mixed $record,
        ?string $rkey = null,
        ?bool $validate = null,
        ?string $swapCommit = null,
    ): self {
        $instance = new self();
        $instance->repo = $repo;
        $instance->collection = $collection;
        $instance->record = $record;
        if ($rkey !== null) {
            $instance->rkey = $rkey;
        }
        if ($validate !== null) {
            $instance->validate = $validate;
        }
        if ($swapCommit !== null) {
            $instance->swapCommit = $swapCommit;
        }

        return $instance;
    }
}
