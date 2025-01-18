<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Moderation\CreateReport;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.moderation.createReport';

    public int $id;
    public string $reasonType;
    public ?string $reason;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef */
    public mixed $subject;
    public string $reportedBy;
    public \DateTimeInterface $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        int $id,
        string $reasonType,
        \Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\RepoRef|\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject,
        string $reportedBy,
        \DateTimeInterface $createdAt,
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
