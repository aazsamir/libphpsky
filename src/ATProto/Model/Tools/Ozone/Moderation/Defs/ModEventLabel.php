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

    /** @var array<string> */
    public array $createLabelVals = [];

    /** @var array<string> */
    public array $negateLabelVals = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $createLabelVals
     * @param array<string> $negateLabelVals
     */
    public static function new(array $createLabelVals, array $negateLabelVals, ?string $comment = null): self
    {
        $instance = new self();
        $instance->createLabelVals = $createLabelVals;
        $instance->negateLabelVals = $negateLabelVals;
        $instance->comment = $comment;

        return $instance;
    }
}
