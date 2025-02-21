<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Set priority score of the subject. Higher score means higher priority.
 * object
 */
class ModEventPriorityScore implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventPriorityScore';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;
    public int $score;

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
        return ['score'];
    }

    public static function new(int $score, ?string $comment = null): self
    {
        $instance = new self();
        $instance->score = $score;
        if ($comment !== null) {
            $instance->comment = $comment;
        }

        return $instance;
    }
}
