<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Take down a subject permanently or temporarily
 * object
 */
class ModEventTakedown implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventTakedown';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;

    /** @var ?int Indicates how long the takedown should be in effect before automatically expiring. */
    public ?int $durationInHours;

    /** @var ?bool If true, all other reports on content authored by this account will be resolved (acknowledged). */
    public ?bool $acknowledgeAccountSubjects;

    /** @var ?array<string> Names/Keywords of the policies that drove the decision. */
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
