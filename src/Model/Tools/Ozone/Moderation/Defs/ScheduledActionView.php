<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * View of a scheduled moderation action
 * object
 */
class ScheduledActionView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'scheduledActionView';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var int Auto-incrementing row ID */
    public int $id;

    /** @var string Type of action to be executed */
    public string $action;
    public mixed $eventData;

    /** @var string Subject DID for the action */
    public string $did;

    /** @var ?\DateTimeInterface Exact time to execute the action */
    public ?\DateTimeInterface $executeAt;

    /** @var ?\DateTimeInterface Earliest time to execute the action (for randomized scheduling) */
    public ?\DateTimeInterface $executeAfter;

    /** @var ?\DateTimeInterface Latest time to execute the action (for randomized scheduling) */
    public ?\DateTimeInterface $executeUntil;

    /** @var ?bool Whether execution time should be randomized within the specified range */
    public ?bool $randomizeExecution;

    /** @var string DID of the user who created this scheduled action */
    public string $createdBy;

    /** @var \DateTimeInterface When the scheduled action was created */
    public \DateTimeInterface $createdAt;

    /** @var ?\DateTimeInterface When the scheduled action was last updated */
    public ?\DateTimeInterface $updatedAt;

    /** @var string Current status of the scheduled action */
    public string $status;

    /** @var ?\DateTimeInterface When the action was last attempted to be executed */
    public ?\DateTimeInterface $lastExecutedAt;

    /** @var ?string Reason for the last execution failure */
    public ?string $lastFailureReason;

    /** @var ?int ID of the moderation event created when action was successfully executed */
    public ?int $executionEventId;

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
        return ['id', 'action', 'did', 'createdBy', 'createdAt', 'status'];
    }

    public static function new(
        int $id,
        string $action,
        string $did,
        string $createdBy,
        \DateTimeInterface $createdAt,
        string $status,
        mixed $eventData = null,
        ?\DateTimeInterface $executeAt = null,
        ?\DateTimeInterface $executeAfter = null,
        ?\DateTimeInterface $executeUntil = null,
        ?bool $randomizeExecution = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $lastExecutedAt = null,
        ?string $lastFailureReason = null,
        ?int $executionEventId = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->action = $action;
        $instance->did = $did;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;
        $instance->status = $status;
        if ($eventData !== null) {
            $instance->eventData = $eventData;
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
        if ($randomizeExecution !== null) {
            $instance->randomizeExecution = $randomizeExecution;
        }
        if ($updatedAt !== null) {
            $instance->updatedAt = $updatedAt;
        }
        if ($lastExecutedAt !== null) {
            $instance->lastExecutedAt = $lastExecutedAt;
        }
        if ($lastFailureReason !== null) {
            $instance->lastFailureReason = $lastFailureReason;
        }
        if ($executionEventId !== null) {
            $instance->executionEventId = $executionEventId;
        }

        return $instance;
    }
}
