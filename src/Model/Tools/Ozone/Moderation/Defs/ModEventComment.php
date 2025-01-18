<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventComment implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventComment';
    public const ID = 'tools.ozone.moderation.defs';

    public string $comment;
    public ?bool $sticky;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $comment, ?bool $sticky = null): self
    {
        $instance = new self();
        $instance->comment = $comment;
        $instance->sticky = $sticky;

        return $instance;
    }
}
