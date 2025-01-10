<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventAcknowledge implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

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
