<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModerationDetail implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'moderationDetail';
    public const ID = 'tools.ozone.moderation.defs';

    public ?SubjectStatusView $subjectStatus = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?SubjectStatusView $subjectStatus = null): self
    {
        $instance = new self();
        $instance->subjectStatus = $subjectStatus;

        return $instance;
    }
}
