<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventAcknowledge implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'modEventAcknowledge';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public ?bool $acknowledgeAccountSubjects = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $comment = null, ?bool $acknowledgeAccountSubjects = null): self
    {
        $instance = new self();
        $instance->comment = $comment;
        $instance->acknowledgeAccountSubjects = $acknowledgeAccountSubjects;

        return $instance;
    }
}