<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\DeleteRecord;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.repo.deleteRecord';

    /** @var string The handle or DID of the repo (aka, current account). */
    public string $repo;

    /** @var string The NSID of the record collection. */
    public string $collection;

    /** @var string The Record Key. */
    public string $rkey;

    /** @var ?string Compare and swap with the previous record by CID. */
    public ?string $swapRecord;

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
        return ['repo', 'collection', 'rkey'];
    }

    public static function new(
        string $repo,
        string $collection,
        string $rkey,
        ?string $swapRecord = null,
        ?string $swapCommit = null,
    ): self {
        $instance = new self();
        $instance->repo = $repo;
        $instance->collection = $collection;
        $instance->rkey = $rkey;
        if ($swapRecord !== null) {
            $instance->swapRecord = $swapRecord;
        }
        if ($swapCommit !== null) {
            $instance->swapCommit = $swapCommit;
        }

        return $instance;
    }
}
