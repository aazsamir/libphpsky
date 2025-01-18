<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetRepos;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.getRepos';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewDetail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewNotFound> */
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
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewDetail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewNotFound> $repos
     */
    public static function new(array $repos): self
    {
        $instance = new self();
        $instance->repos = $repos;

        return $instance;
    }
}
