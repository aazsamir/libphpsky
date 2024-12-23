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
}
