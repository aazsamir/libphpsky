<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Logs a scheduled takedown action for an account.
 * object
 */
class ScheduleTakedownEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'scheduleTakedownEvent';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;
    public ?\DateTimeInterface $executeAt;
    public ?\DateTimeInterface $executeAfter;
    public ?\DateTimeInterface $executeUntil;

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

    public static function new(
        ?string $comment = null,
        ?\DateTimeInterface $executeAt = null,
        ?\DateTimeInterface $executeAfter = null,
        ?\DateTimeInterface $executeUntil = null,
    ): self {
        $instance = new self();
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($executeAt !== null) {
            $instance->executeAt = $executeAt;
        }
        if ($executeAfter !== null) {
            $instance->executeAfter = $executeAfter;
        }
        if ($executeUntil !== null) {
            $instance->executeUntil = $executeUntil;
        }

        return $instance;
    }
}
