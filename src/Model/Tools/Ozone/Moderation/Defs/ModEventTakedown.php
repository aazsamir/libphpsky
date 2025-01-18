<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventTakedown implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventTakedown';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;
    public ?int $durationInHours;
    public ?bool $acknowledgeAccountSubjects;

    /** @var array<string>|null */
    public ?array $policies = [];

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

    /**
     * @param array<string> $policies
     */
    public static function new(
        ?string $comment = null,
        ?int $durationInHours = null,
        ?bool $acknowledgeAccountSubjects = null,
        ?array $policies = [],
    ): self {
        $instance = new self();
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($durationInHours !== null) {
            $instance->durationInHours = $durationInHours;
        }
        if ($acknowledgeAccountSubjects !== null) {
            $instance->acknowledgeAccountSubjects = $acknowledgeAccountSubjects;
        }
        if ($policies !== null) {
            $instance->policies = $policies;
        }

        return $instance;
    }
}
