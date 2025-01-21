<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\PutRecord;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.repo.putRecord';

    /** @var string The handle or DID of the repo (aka, current account). */
    public string $repo;

    /** @var string The NSID of the record collection. */
    public string $collection;

    /** @var string The Record Key. */
    public string $rkey;

    /** @var ?bool Can be set to 'false' to skip Lexicon schema validation of record data, 'true' to require it, or leave unset to validate only for known Lexicons. */
    public ?bool $validate;
    public mixed $record;

    /** @var ?string Compare and swap with the previous record by CID. WARNING: nullable and optional field; may cause problems with golang implementation */
    public ?string $swapRecord = null;

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
        return ['swapRecord'];
    }

    public static function required(): array
    {
        return ['repo', 'collection', 'rkey', 'record'];
    }

    public static function new(
        string $repo,
        string $collection,
        string $rkey,
        mixed $record,
        ?bool $validate = null,
        ?string $swapRecord = null,
        ?string $swapCommit = null,
    ): self {
        $instance = new self();
        $instance->repo = $repo;
        $instance->collection = $collection;
        $instance->rkey = $rkey;
        $instance->record = $record;
        if ($validate !== null) {
            $instance->validate = $validate;
        }
        $instance->swapRecord = $swapRecord;
        if ($swapCommit !== null) {
            $instance->swapCommit = $swapCommit;
        }

        return $instance;
    }
}
