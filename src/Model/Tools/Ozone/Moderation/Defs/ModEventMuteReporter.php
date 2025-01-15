<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventMuteReporter implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'modEventMuteReporter';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public ?int $durationInHours = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $comment = null, ?int $durationInHours = null): self
    {
        $instance = new self();
        $instance->comment = $comment;
        $instance->durationInHours = $durationInHours;

        return $instance;
    }
}
