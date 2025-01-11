<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventViewDetail implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventViewDetail';
    public const ID = 'tools.ozone.moderation.defs';

    public int $id;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventTakedown|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventReverseTakedown|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventComment|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventReport|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventLabel|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventAcknowledge|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventEscalate|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventMute|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventUnmute|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventMuteReporter|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventUnmuteReporter|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventEmail|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventResolveAppeal|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventDivert|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventTag|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\AccountEvent|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\IdentityEvent|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RecordEvent */
    public mixed $event;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RepoView|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RepoViewNotFound|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RecordView|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RecordViewNotFound */
    public mixed $subject;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\BlobView> */
    public array $subjectBlobs = [];
    public string $createdBy;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\BlobView> $subjectBlobs
     */
    public static function new(
        int $id,
        ModEventTakedown|ModEventReverseTakedown|ModEventComment|ModEventReport|ModEventLabel|ModEventAcknowledge|ModEventEscalate|ModEventMute|ModEventUnmute|ModEventMuteReporter|ModEventUnmuteReporter|ModEventEmail|ModEventResolveAppeal|ModEventDivert|ModEventTag|AccountEvent|IdentityEvent|RecordEvent $event,
        RepoView|RepoViewNotFound|RecordView|RecordViewNotFound $subject,
        array $subjectBlobs,
        string $createdBy,
        string $createdAt,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->event = $event;
        $instance->subject = $subject;
        $instance->subjectBlobs = $subjectBlobs;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
