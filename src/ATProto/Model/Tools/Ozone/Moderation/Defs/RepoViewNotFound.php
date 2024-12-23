<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RepoViewNotFound implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'repoViewNotFound';
    public const ID = 'tools.ozone.moderation.defs';

    public string $did;

    public static function id(): string
    {
        return self::ID;
    }
}
