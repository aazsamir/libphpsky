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

    public string $repo;
    public string $collection;
    public ?string $rkey;
    public ?bool $validate;
    public mixed $record;
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
