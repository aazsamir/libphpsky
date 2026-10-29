<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetReport;

/**
 * object
 */
class ReportView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reportView';
    public const ID = 'tools.ozone.inbox.getReport';

    /** @var string DID of the moderation service that received the report. */
    public string $src;

    /** @var int Report ID (report table ID), used by Ozone's report detail page. */
    public int $id;

    /** @var string The exact fully-qualified reason NSID submitted with and stored on the report. */
    public string $reasonType;
    public ?string $reason;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoRef */
    public mixed $subject;
    public mixed $record;
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
        return ['src', 'id', 'reasonType', 'subject', 'status', 'createdAt', 'updatedAt'];
    }

    public static function new(
        string $src,
        int $id,
        string $reasonType,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageRef|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\ConvoRef $subject,
        string $status,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        ?string $reason = null,
        mixed $record = null,
    ): self {
        $instance = new self();
        $instance->src = $src;
        $instance->id = $id;
        $instance->reasonType = $reasonType;
        $instance->subject = $subject;
        $instance->status = $status;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        if ($reason !== null) {
            $instance->reason = $reason;
        }
        if ($record !== null) {
            $instance->record = $record;
        }

        return $instance;
    }
}
