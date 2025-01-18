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

    public string $repo;
    public string $collection;
    public string $rkey;
    public ?string $swapRecord;
    public ?string $swapCommit;

    public static function id(): string
    {
        return self::ID;
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
        $instance->swapRecord = $swapRecord;
        $instance->swapCommit = $swapCommit;

        return $instance;
    }
}
