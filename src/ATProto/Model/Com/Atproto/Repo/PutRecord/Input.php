<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\PutRecord;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.repo.putRecord';

    public string $repo;
    public string $collection;
    public string $rkey;
    public ?bool $validate = null;
    public mixed $record;
    public ?string $swapRecord = null;
    public ?string $swapCommit = null;

    public static function id(): string
    {
        return self::ID;
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
        $instance->validate = $validate;
        $instance->swapRecord = $swapRecord;
        $instance->swapCommit = $swapCommit;

        return $instance;
    }
}
