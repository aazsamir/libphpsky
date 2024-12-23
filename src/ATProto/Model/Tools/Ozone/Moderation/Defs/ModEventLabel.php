<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventLabel implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventLabel';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;

    /** @var string[] */
    public array $createLabelVals = [];

    /** @var string[] */
    public array $negateLabelVals = [];

    public static function id(): string
    {
        return self::ID;
    }
}
