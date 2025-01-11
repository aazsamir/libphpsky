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

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef */
    public mixed $subject;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\AccountHosting|\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\RecordHosting|null */
    public mixed $hosting = null;

    /** @var array<string>|null */
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
        \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject,
        string $updatedAt,
        string $createdAt,
        AccountHosting|RecordHosting|null $hosting = null,
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
