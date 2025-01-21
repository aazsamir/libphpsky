<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Resolve appeal on a subject
 * object
 */
class ModEventResolveAppeal implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventResolveAppeal';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var ?string Describe resolution. */
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
