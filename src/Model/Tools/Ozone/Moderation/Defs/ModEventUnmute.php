<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Unmute action on a subject
 * object
 */
class ModEventUnmute implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventUnmute';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var ?string Describe reasoning behind the reversal. */
    public ?string $comment;

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
        return [];
    }

    public static function new(?string $comment = null): self
    {
        $instance = new self();
        if ($comment !== null) {
            $instance->comment = $comment;
        }

        return $instance;
    }
}
