<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\AssignModerator;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.report.assignModerator';

    /** @var int The ID of the report to assign. */
    public int $reportId;

    /** @var ?int Optional queue ID to associate the assignment with. If not provided and the report has been assigned on a queue before, it will stay on that queue. */
    public ?int $queueId;

    /** @var ?string DID to be assigned. Defaults to the caller's DID. Admins may assign to any moderator. */
    public ?string $did;

    /** @var ?bool When true, the assignment has no expiry (endAt is null). Throws AlreadyAssigned if another user already has a permanent assignment on this report. */
    public ?bool $isPermanent;

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
        return ['reportId'];
    }

    public static function new(
        int $reportId,
        ?int $queueId = null,
        ?string $did = null,
        ?bool $isPermanent = null,
    ): self {
        $instance = new self();
        $instance->reportId = $reportId;
        if ($queueId !== null) {
            $instance->queueId = $queueId;
        }
        if ($did !== null) {
            $instance->did = $did;
        }
        if ($isPermanent !== null) {
            $instance->isPermanent = $isPermanent;
        }

        return $instance;
    }
}
