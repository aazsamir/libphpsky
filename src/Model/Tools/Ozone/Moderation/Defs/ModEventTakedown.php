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

    /** @var ?string Severity level of the violation (e.g., 'sev-0', 'sev-1', 'sev-2', etc.). */
    public ?string $severityLevel;

    /** @var ?array<string> List of services where the takedown should be applied. If empty or not provided, takedown is applied on all configured services. */
    public ?array $targetServices = [];

    /** @var ?int Number of strikes to assign to the user for this violation. */
    public ?int $strikeCount;

    /** @var ?\DateTimeInterface When the strike should expire. If not provided, the strike never expires. */
    public ?\DateTimeInterface $strikeExpiresAt;

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
     * @param array<string> $targetServices
     */
    public static function new(
        ?string $comment = null,
        ?int $durationInHours = null,
        ?bool $acknowledgeAccountSubjects = null,
        ?array $policies = [],
        ?string $severityLevel = null,
        ?array $targetServices = [],
        ?int $strikeCount = null,
        ?\DateTimeInterface $strikeExpiresAt = null,
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
        if ($severityLevel !== null) {
            $instance->severityLevel = $severityLevel;
        }
        if ($targetServices !== null) {
            $instance->targetServices = $targetServices;
        }
        if ($strikeCount !== null) {
            $instance->strikeCount = $strikeCount;
        }
        if ($strikeExpiresAt !== null) {
            $instance->strikeExpiresAt = $strikeExpiresAt;
        }

        return $instance;
    }
}
