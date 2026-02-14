<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ScheduleAction;

/**
 * Schedule a takedown action
 * object
 */
class Takedown implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'takedown';
    public const ID = 'tools.ozone.moderation.scheduleAction';

    public ?string $comment;

    /** @var ?int Indicates how long the takedown should be in effect before automatically expiring. */
    public ?int $durationInHours;

    /** @var ?bool If true, all other reports on content authored by this account will be resolved (acknowledged). */
    public ?bool $acknowledgeAccountSubjects;

    /** @var ?array<string> Names/Keywords of the policies that drove the decision. */
    public ?array $policies = [];

    /** @var ?string Severity level of the violation (e.g., 'sev-0', 'sev-1', 'sev-2', etc.). */
    public ?string $severityLevel;

    /** @var ?int Number of strikes to assign to the user when takedown is applied. */
    public ?int $strikeCount;

    /** @var ?\DateTimeInterface When the strike should expire. If not provided, the strike never expires. */
    public ?\DateTimeInterface $strikeExpiresAt;

    /** @var ?string Email content to be sent to the user upon takedown. */
    public ?string $emailContent;

    /** @var ?string Subject of the email to be sent to the user upon takedown. */
    public ?string $emailSubject;

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
        ?string $severityLevel = null,
        ?int $strikeCount = null,
        ?\DateTimeInterface $strikeExpiresAt = null,
        ?string $emailContent = null,
        ?string $emailSubject = null,
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
        if ($strikeCount !== null) {
            $instance->strikeCount = $strikeCount;
        }
        if ($strikeExpiresAt !== null) {
            $instance->strikeExpiresAt = $strikeExpiresAt;
        }
        if ($emailContent !== null) {
            $instance->emailContent = $emailContent;
        }
        if ($emailSubject !== null) {
            $instance->emailSubject = $emailSubject;
        }

        return $instance;
    }
}
