<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\EmitEvent;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.moderation.emitEvent';

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventAcknowledge|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEscalate|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventComment|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventLabel|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReport|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReverseTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventResolveAppeal|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEmail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventDivert|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTag|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AccountEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\IdentityEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventPriorityScore|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AgeAssuranceEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AgeAssuranceOverrideEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RevokeAccountCredentialsEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ScheduleTakedownEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\CancelScheduledTakedownEvent */
    public mixed $event;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef */
    public mixed $subject;

    /** @var ?array<string> */
    public ?array $subjectBlobCids = [];
    public string $createdBy;
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModTool $modTool;

    /** @var ?string An optional external ID for the event, used to deduplicate events from external systems. Fails when an event of same type with the same external ID exists for the same subject. */
    public ?string $externalId;

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
        return ['event', 'subject', 'createdBy'];
    }

    /**
     * @param array<string> $subjectBlobCids
     */
    public static function new(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventAcknowledge|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEscalate|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventComment|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventLabel|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReport|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReverseTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventResolveAppeal|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEmail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventDivert|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTag|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AccountEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\IdentityEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventPriorityScore|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AgeAssuranceEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AgeAssuranceOverrideEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RevokeAccountCredentialsEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ScheduleTakedownEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\CancelScheduledTakedownEvent $event,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject,
        string $createdBy,
        ?array $subjectBlobCids = [],
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModTool $modTool = null,
        ?string $externalId = null,
    ): self {
        $instance = new self();
        $instance->event = $event;
        $instance->subject = $subject;
        $instance->createdBy = $createdBy;
        if ($subjectBlobCids !== null) {
            $instance->subjectBlobCids = $subjectBlobCids;
        }
        if ($modTool !== null) {
            $instance->modTool = $modTool;
        }
        if ($externalId !== null) {
            $instance->externalId = $externalId;
        }

        return $instance;
    }
}
