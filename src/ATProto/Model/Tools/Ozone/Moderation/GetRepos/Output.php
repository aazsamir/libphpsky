<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\GetRepos;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.getRepos';

    /** @var mixed[] */
    public array $repos = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param mixed[] $repos
     */
    public static function new(array $repos): self
    {
        $instance = new self();
        $instance->repos = $repos;

        return $instance;
    }
}
