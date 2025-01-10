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
    public mixed $event;
    public mixed $subject;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\BlobView[] */
    public array $subjectBlobs = [];
    public string $createdBy;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\BlobView[] $subjectBlobs
     */
    public static function new(
        int $id,
        mixed $event,
        mixed $subject,
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
