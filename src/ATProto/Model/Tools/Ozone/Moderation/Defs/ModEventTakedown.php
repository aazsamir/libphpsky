<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventTakedown implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventTakedown';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public ?int $durationInHours = null;
    public ?bool $acknowledgeAccountSubjects = null;

    public static function id(): string
    {
        return self::ID;
    }
}
