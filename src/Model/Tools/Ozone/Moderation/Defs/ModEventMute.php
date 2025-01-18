<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventMute implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventMute';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;
    public int $durationInHours;

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
        return ['durationInHours'];
    }

    public static function new(int $durationInHours, ?string $comment = null): self
    {
        $instance = new self();
        $instance->durationInHours = $durationInHours;
        if ($comment !== null) {
            $instance->comment = $comment;
        }

        return $instance;
    }
}
