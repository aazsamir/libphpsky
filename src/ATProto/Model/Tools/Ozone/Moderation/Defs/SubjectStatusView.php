<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class SubjectStatusView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'subjectStatusView';
    public const ID = 'tools.ozone.moderation.defs';

    public int $id;
    public mixed $subject;
    public mixed $hosting = null;

    /** @var string[] */
    public ?array $subjectBlobCids = [];
    public ?string $subjectRepoHandle = null;
    public string $updatedAt;
    public string $createdAt;
    public ?string $reviewState = null;
    public ?string $comment = null;
    public ?string $muteUntil = null;
    public ?string $muteReportingUntil = null;
    public ?string $lastReviewedBy = null;
    public ?string $lastReviewedAt = null;
    public ?string $lastReportedAt = null;
    public ?string $lastAppealedAt = null;
    public ?bool $takendown = null;
    public ?bool $appealed = null;
    public ?string $suspendUntil = null;

    /** @var string[] */
    public ?array $tags = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $subjectBlobCids
     * @param string[] $tags
     */
    public static function new(
        int $id,
        mixed $subject,
        string $updatedAt,
        string $createdAt,
        mixed $hosting = null,
        ?array $subjectBlobCids = null,
        ?string $subjectRepoHandle = null,
        ?string $reviewState = null,
        ?string $comment = null,
        ?string $muteUntil = null,
        ?string $muteReportingUntil = null,
        ?string $lastReviewedBy = null,
        ?string $lastReviewedAt = null,
        ?string $lastReportedAt = null,
        ?string $lastAppealedAt = null,
        ?bool $takendown = null,
        ?bool $appealed = null,
        ?string $suspendUntil = null,
        ?array $tags = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->subject = $subject;
        $instance->updatedAt = $updatedAt;
        $instance->createdAt = $createdAt;
        $instance->hosting = $hosting;
        $instance->subjectBlobCids = $subjectBlobCids;
        $instance->subjectRepoHandle = $subjectRepoHandle;
        $instance->reviewState = $reviewState;
        $instance->comment = $comment;
        $instance->muteUntil = $muteUntil;
        $instance->muteReportingUntil = $muteReportingUntil;
        $instance->lastReviewedBy = $lastReviewedBy;
        $instance->lastReviewedAt = $lastReviewedAt;
        $instance->lastReportedAt = $lastReportedAt;
        $instance->lastAppealedAt = $lastAppealedAt;
        $instance->takendown = $takendown;
        $instance->appealed = $appealed;
        $instance->suspendUntil = $suspendUntil;
        $instance->tags = $tags;

        return $instance;
    }
}
