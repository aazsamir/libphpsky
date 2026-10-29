<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\ListReports;

/**
 * object
 */
class ReportView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reportView';
    public const ID = 'tools.ozone.inbox.listReports';

    /** @var string DID of the moderation service that received the report. */
    public string $src;

    /** @var int Report ID (report table ID), used by getReport and Ozone's report detail page. */
    public int $id;
    public bool $isRead;

    /** @var string The exact fully-qualified reason NSID submitted with and stored on the report. */
    public string $reasonType;
    public ?string $reason;

    /** @var ?string Public action associated with this report's transition to resolved. See the public action vocabulary table. */
    public ?string $lastActionTaken;
    public ?string $scope;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoRef */
    public mixed $subject;
    public string $status;
    public \DateTimeInterface $createdAt;
    public \DateTimeInterface $updatedAt;

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
        return ['src', 'id', 'isRead', 'reasonType', 'subject', 'status', 'createdAt', 'updatedAt'];
    }

    public static function new(
        string $src,
        int $id,
        bool $isRead,
        string $reasonType,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoRef $subject,
        string $status,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        ?string $reason = null,
        ?string $lastActionTaken = null,
        ?string $scope = null,
    ): self {
        $instance = new self();
        $instance->src = $src;
        $instance->id = $id;
        $instance->isRead = $isRead;
        $instance->reasonType = $reasonType;
        $instance->subject = $subject;
        $instance->status = $status;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        if ($reason !== null) {
            $instance->reason = $reason;
        }
        if ($lastActionTaken !== null) {
            $instance->lastActionTaken = $lastActionTaken;
        }
        if ($scope !== null) {
            $instance->scope = $scope;
        }

        return $instance;
    }
}
