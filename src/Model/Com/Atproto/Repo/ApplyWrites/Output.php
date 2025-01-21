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

    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs\CommitMeta $commit;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\CreateResult|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\UpdateResult|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\DeleteResult> */
    public ?array $results = [];

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
        return [];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\CreateResult|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\UpdateResult|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ApplyWrites\DeleteResult> $results
     */
    public static function new(
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null,
        ?array $results = [],
    ): self {
        $instance = new self();
        if ($commit !== null) {
            $instance->commit = $commit;
        }
        if ($results !== null) {
            $instance->results = $results;
        }

        return $instance;
    }
}
