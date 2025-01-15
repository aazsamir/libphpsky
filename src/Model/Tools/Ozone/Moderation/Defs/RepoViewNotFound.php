<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RepoViewNotFound implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'repoViewNotFound';
    public const ID = 'tools.ozone.moderation.defs';

    public string $did;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $did): self
    {
        $instance = new self();
        $instance->did = $did;

        return $instance;
    }
}
