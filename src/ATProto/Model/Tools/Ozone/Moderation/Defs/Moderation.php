<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class Moderation implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'moderation';
    public const ID = 'tools.ozone.moderation.defs';

    public ?SubjectStatusView $subjectStatus = null;

    public static function id(): string
    {
        return self::ID;
    }
}
