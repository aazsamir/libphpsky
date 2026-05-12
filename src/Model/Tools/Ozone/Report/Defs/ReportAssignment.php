<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs;

/**
 * Information about the moderator currently assigned to a report.
 * object
 */
class ReportAssignment implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reportAssignment';
    public const ID = 'tools.ozone.report.defs';

    /** @var string DID of the assigned moderator */
    public string $did;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member Full member record of the assigned moderator */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member $moderator;

    /** @var \DateTimeInterface When the report was assigned */
    public \DateTimeInterface $assignedAt;

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
        return ['did', 'assignedAt'];
    }

    public static function new(
        string $did,
        \DateTimeInterface $assignedAt,
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member $moderator = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->assignedAt = $assignedAt;
        if ($moderator !== null) {
            $instance->moderator = $moderator;
        }

        return $instance;
    }
}
