<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\EmitEvent;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.moderation.emitEvent';

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventAcknowledge|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEscalate|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventComment|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventLabel|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReport|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReverseTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventResolveAppeal|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEmail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTag|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AccountEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\IdentityEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordEvent */
    public mixed $event;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef */
    public mixed $subject;

    /** @var array<string>|null */
    public ?array $subjectBlobCids = [];
    public string $createdBy;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $subjectBlobCids
     */
    public static function new(
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventAcknowledge|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEscalate|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventComment|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventLabel|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReport|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmute|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventMuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventUnmuteReporter|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventReverseTakedown|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventResolveAppeal|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventEmail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ModEventTag|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AccountEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\IdentityEvent|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordEvent $event,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject,
        string $createdBy,
        ?array $subjectBlobCids = null,
    ): self {
        $instance = new self();
        $instance->event = $event;
        $instance->subject = $subject;
        $instance->createdBy = $createdBy;
        $instance->subjectBlobCids = $subjectBlobCids;

        return $instance;
    }
}
