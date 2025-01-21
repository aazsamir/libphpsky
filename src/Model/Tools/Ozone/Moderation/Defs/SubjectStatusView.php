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

    /** @var ?array<string> */
    public ?array $subjectBlobCids = [];
    public ?string $subjectRepoHandle;

    /** @var \DateTimeInterface Timestamp referencing when the last update was made to the moderation status of the subject */
    public \DateTimeInterface $updatedAt;

    /** @var \DateTimeInterface Timestamp referencing the first moderation status impacting event was emitted on the subject */
    public \DateTimeInterface $createdAt;
    public ?string $reviewState;

    /** @var ?string Sticky comment on the subject. */
    public ?string $comment;
    public ?\DateTimeInterface $muteUntil;
    public ?\DateTimeInterface $muteReportingUntil;
    public ?string $lastReviewedBy;
    public ?\DateTimeInterface $lastReviewedAt;
    public ?\DateTimeInterface $lastReportedAt;

    /** @var ?\DateTimeInterface Timestamp referencing when the author of the subject appealed a moderation action */
    public ?\DateTimeInterface $lastAppealedAt;
    public ?bool $takendown;

    /** @var ?bool True indicates that the a previously taken moderator action was appealed against, by the author of the content. False indicates last appeal was resolved by moderators. */
    public ?bool $appealed;
    public ?\DateTimeInterface $suspendUntil;

    /** @var ?array<string> */
    public ?array $tags = [];

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\AccountStats Statistics related to the account subject */
    public ?AccountStats $accountStats;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RecordsStats Statistics related to the record subjects authored by the subject's account */
    public ?RecordsStats $recordsStats;

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
        return ['id', 'subject', 'createdAt', 'updatedAt', 'reviewState'];
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
        ?AccountStats $accountStats = null,
        ?RecordsStats $recordsStats = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->subject = $subject;
        $instance->updatedAt = $updatedAt;
        $instance->createdAt = $createdAt;
        if ($hosting !== null) {
            $instance->hosting = $hosting;
        }
        if ($subjectBlobCids !== null) {
            $instance->subjectBlobCids = $subjectBlobCids;
        }
        if ($subjectRepoHandle !== null) {
            $instance->subjectRepoHandle = $subjectRepoHandle;
        }
        if ($reviewState !== null) {
            $instance->reviewState = $reviewState;
        }
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($muteUntil !== null) {
            $instance->muteUntil = $muteUntil;
        }
        if ($muteReportingUntil !== null) {
            $instance->muteReportingUntil = $muteReportingUntil;
        }
        if ($lastReviewedBy !== null) {
            $instance->lastReviewedBy = $lastReviewedBy;
        }
        if ($lastReviewedAt !== null) {
            $instance->lastReviewedAt = $lastReviewedAt;
        }
        if ($lastReportedAt !== null) {
            $instance->lastReportedAt = $lastReportedAt;
        }
        if ($lastAppealedAt !== null) {
            $instance->lastAppealedAt = $lastAppealedAt;
        }
        if ($takendown !== null) {
            $instance->takendown = $takendown;
        }
        if ($appealed !== null) {
            $instance->appealed = $appealed;
        }
        if ($suspendUntil !== null) {
            $instance->suspendUntil = $suspendUntil;
        }
        if ($tags !== null) {
            $instance->tags = $tags;
        }
        if ($accountStats !== null) {
            $instance->accountStats = $accountStats;
        }
        if ($recordsStats !== null) {
            $instance->recordsStats = $recordsStats;
        }

        return $instance;
    }
}
