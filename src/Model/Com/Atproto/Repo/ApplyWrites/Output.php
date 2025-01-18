<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.applyWrites';

    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\CreateResult|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\UpdateResult|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\DeleteResult>|null */
    public ?array $results = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\CreateResult|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\UpdateResult|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\DeleteResult> $results
     */
    public static function new(
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null,
        ?array $results = null,
    ): self {
        $instance = new self();
        $instance->commit = $commit;
        $instance->results = $results;

        return $instance;
    }
}
