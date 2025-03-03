<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Add a comment to a subject. An empty comment will clear any previously set sticky comment.
 * object
 */
class ModEventComment implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventComment';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;

    /** @var ?bool Make the comment persistent on the subject */
    public ?bool $sticky;

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

    public static function new(?string $comment = null, ?bool $sticky = null): self
    {
        $instance = new self();
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($sticky !== null) {
            $instance->sticky = $sticky;
        }

        return $instance;
    }
}
