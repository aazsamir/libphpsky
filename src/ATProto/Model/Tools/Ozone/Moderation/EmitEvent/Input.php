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

    public mixed $event;
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
