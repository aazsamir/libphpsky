<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Moderation\CreateReport;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.moderation.createReport';

    public int $id;
    public string $reasonType;
    public ?string $reason = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef */
    public mixed $subject;
    public string $reportedBy;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        int $id,
        string $reasonType,
        \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject,
        string $reportedBy,
        string $createdAt,
        ?string $reason = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->reasonType = $reasonType;
        $instance->subject = $subject;
        $instance->reportedBy = $reportedBy;
        $instance->createdAt = $createdAt;
        $instance->reason = $reason;

        return $instance;
    }
}
