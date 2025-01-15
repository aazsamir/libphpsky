<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListRepos;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.sync.listRepos';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListRepos\Repo> */
    public array $repos = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListRepos\Repo> $repos
     */
    public static function new(array $repos, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->repos = $repos;
        $instance->cursor = $cursor;

        return $instance;
    }
}
