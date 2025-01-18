<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventEmail implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventEmail';
    public const ID = 'tools.ozone.moderation.defs';

    public string $subjectLine;
    public ?string $content;
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
        return ['subjectLine'];
    }

    public static function new(string $subjectLine, ?string $content = null, ?string $comment = null): self
    {
        $instance = new self();
        $instance->subjectLine = $subjectLine;
        if ($content !== null) {
            $instance->content = $content;
        }
        if ($comment !== null) {
            $instance->comment = $comment;
        }

        return $instance;
    }
}
