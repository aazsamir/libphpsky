<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ApplyWrites;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.repo.applyWrites';

    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null;

    /** @var mixed[] */
    public ?array $results = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param mixed[] $results
     */
    public static function new(
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\Defs\CommitMeta $commit = null,
        ?array $results = null,
    ): self {
        $instance = new self();
        $instance->commit = $commit;
        $instance->results = $results;

        return $instance;
    }
}
