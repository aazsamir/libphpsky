<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventComment implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventComment';
    public const ID = 'tools.ozone.moderation.defs';

    public string $comment;
    public ?bool $sticky = null;

    public static function id(): string
    {
        return self::ID;
    }
}
