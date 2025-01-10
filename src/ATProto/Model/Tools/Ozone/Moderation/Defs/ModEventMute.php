<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventMute implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventMute';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public int $durationInHours;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $durationInHours, ?string $comment = null): self
    {
        $instance = new self();
        $instance->durationInHours = $durationInHours;
        $instance->comment = $comment;

        return $instance;
    }
}
