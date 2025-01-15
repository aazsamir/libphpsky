<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\SearchRepos;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.searchRepos';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoView> */
    public array $repos = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoView> $repos
     */
    public static function new(array $repos, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->repos = $repos;
        $instance->cursor = $cursor;

        return $instance;
    }
}
