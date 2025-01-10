<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\EmitEvent;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.moderation.emitEvent';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventTakedown|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventAcknowledge|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventEscalate|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventComment|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventLabel|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventReport|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventMute|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventUnmute|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventMuteReporter|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventUnmuteReporter|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventReverseTakedown|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventResolveAppeal|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventEmail|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\ModEventTag|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\AccountEvent|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\IdentityEvent|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RecordEvent */
    public mixed $event;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\EmitEvent\EmitEvent */
    public mixed $subject;

    /** @var string[] */
    public ?array $subjectBlobCids = [];
    public string $createdBy;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $subjectBlobCids
     */
    public static function new(mixed $event, mixed $subject, string $createdBy, ?array $subjectBlobCids = null): self
    {
        $instance = new self();
        $instance->event = $event;
        $instance->subject = $subject;
        $instance->createdBy = $createdBy;
        $instance->subjectBlobCids = $subjectBlobCids;

        return $instance;
    }
}
