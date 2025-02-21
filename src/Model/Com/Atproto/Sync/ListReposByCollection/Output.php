<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListReposByCollection;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.sync.listReposByCollection';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListReposByCollection\Repo> */
    public array $repos = [];

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
        return ['repos'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListReposByCollection\Repo> $repos
     */
    public static function new(array $repos, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->repos = $repos;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
