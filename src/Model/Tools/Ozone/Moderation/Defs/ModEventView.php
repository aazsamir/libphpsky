<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventView';
    public const ID = 'tools.ozone.moderation.defs';

    public int $id;

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReverseTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventComment|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReport|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventLabel|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventAcknowledge|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEscalate|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEmail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventResolveAppeal|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventDivert|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTag|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AccountEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\IdentityEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventPriorityScore|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AgeAssuranceEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AgeAssuranceOverrideEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RevokeAccountCredentialsEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ScheduleTakedownEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\CancelScheduledTakedownEvent */
    public mixed $event;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageRef */
    public mixed $subject;

    /** @var array<string> */
    public array $subjectBlobCids = [];
    public string $createdBy;
    public \DateTimeInterface $createdAt;
    public ?string $creatorHandle;
    public ?string $subjectHandle;
    public ?ModTool $modTool;

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
        return ['id', 'event', 'subject', 'subjectBlobCids', 'createdBy', 'createdAt'];
    }

    /**
     * @param array<string> $subjectBlobCids
     */
    public static function new(
        int $id,
        ModEventTakedown|ModEventReverseTakedown|ModEventComment|ModEventReport|ModEventLabel|ModEventAcknowledge|ModEventEscalate|ModEventMute|ModEventUnmute|ModEventMuteReporter|ModEventUnmuteReporter|ModEventEmail|ModEventResolveAppeal|ModEventDivert|ModEventTag|AccountEvent|IdentityEvent|RecordEvent|ModEventPriorityScore|AgeAssuranceEvent|AgeAssuranceOverrideEvent|RevokeAccountCredentialsEvent|ScheduleTakedownEvent|CancelScheduledTakedownEvent $event,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageRef $subject,
        array $subjectBlobCids,
        string $createdBy,
        \DateTimeInterface $createdAt,
        ?string $creatorHandle = null,
        ?string $subjectHandle = null,
        ?ModTool $modTool = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->event = $event;
        $instance->subject = $subject;
        $instance->subjectBlobCids = $subjectBlobCids;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;
        if ($creatorHandle !== null) {
            $instance->creatorHandle = $creatorHandle;
        }
        if ($subjectHandle !== null) {
            $instance->subjectHandle = $subjectHandle;
        }
        if ($modTool !== null) {
            $instance->modTool = $modTool;
        }

        return $instance;
    }
}
