<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class SubjectStatusView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'subjectStatusView';
    public const ID = 'tools.ozone.moderation.defs';

    public int $id;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef */
    public mixed $subject;

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AccountHosting|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordHosting|null */
    public mixed $hosting;

    /** @var array<string>|null */
    public ?array $subjectBlobCids = [];
    public ?string $subjectRepoHandle;
    public \DateTimeInterface $updatedAt;
    public \DateTimeInterface $createdAt;
    public ?string $reviewState;
    public ?string $comment;
    public ?\DateTimeInterface $muteUntil;
    public ?\DateTimeInterface $muteReportingUntil;
    public ?string $lastReviewedBy;
    public ?\DateTimeInterface $lastReviewedAt;
    public ?\DateTimeInterface $lastReportedAt;
    public ?\DateTimeInterface $lastAppealedAt;
    public ?bool $takendown;
    public ?bool $appealed;
    public ?\DateTimeInterface $suspendUntil;

    /** @var array<string>|null */
    public ?array $tags = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $subjectBlobCids
     * @param array<string> $tags
     */
    public static function new(
        int $id,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject,
        \DateTimeInterface $updatedAt,
        \DateTimeInterface $createdAt,
        AccountHosting|RecordHosting|null $hosting = null,
        ?array $subjectBlobCids = [],
        ?string $subjectRepoHandle = null,
        ?string $reviewState = null,
        ?string $comment = null,
        ?\DateTimeInterface $muteUntil = null,
        ?\DateTimeInterface $muteReportingUntil = null,
        ?string $lastReviewedBy = null,
        ?\DateTimeInterface $lastReviewedAt = null,
        ?\DateTimeInterface $lastReportedAt = null,
        ?\DateTimeInterface $lastAppealedAt = null,
        ?bool $takendown = null,
        ?bool $appealed = null,
        ?\DateTimeInterface $suspendUntil = null,
        ?array $tags = [],
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
