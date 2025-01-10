<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventView';
    public const ID = 'tools.ozone.moderation.defs';

    public int $id;
    public mixed $event;
    public mixed $subject;

    /** @var string[] */
    public array $subjectBlobCids = [];
    public string $createdBy;
    public string $createdAt;
    public ?string $creatorHandle = null;
    public ?string $subjectHandle = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $subjectBlobCids
     */
    public static function new(
        int $id,
        mixed $event,
        mixed $subject,
        array $subjectBlobCids,
        string $createdBy,
        string $createdAt,
        ?string $creatorHandle = null,
        ?string $subjectHandle = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->event = $event;
        $instance->subject = $subject;
        $instance->subjectBlobCids = $subjectBlobCids;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;
        $instance->creatorHandle = $creatorHandle;
        $instance->subjectHandle = $subjectHandle;

        return $instance;
    }
}
