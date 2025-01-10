<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventEmail implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventEmail';
    public const ID = 'tools.ozone.moderation.defs';

    public string $subjectLine;
    public ?string $content = null;
    public ?string $comment = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $subjectLine, ?string $content = null, ?string $comment = null): self
    {
        $instance = new self();
        $instance->subjectLine = $subjectLine;
        $instance->content = $content;
        $instance->comment = $comment;

        return $instance;
    }
}
