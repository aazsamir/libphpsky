<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Statistics about a particular account subject
 * object
 */
class AccountStats implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'accountStats';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var ?int Total number of reports on the account */
    public ?int $reportCount;

    /** @var ?int Total number of appeals against a moderation action on the account */
    public ?int $appealCount;

    /** @var ?int Number of times the account was suspended */
    public ?int $suspendCount;

    /** @var ?int Number of times the account was escalated */
    public ?int $escalateCount;

    /** @var ?int Number of times the account was taken down */
    public ?int $takedownCount;

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
        return [];
    }

    public static function new(
        ?int $reportCount = null,
        ?int $appealCount = null,
        ?int $suspendCount = null,
        ?int $escalateCount = null,
        ?int $takedownCount = null,
    ): self {
        $instance = new self();
        if ($reportCount !== null) {
            $instance->reportCount = $reportCount;
        }
        if ($appealCount !== null) {
            $instance->appealCount = $appealCount;
        }
        if ($suspendCount !== null) {
            $instance->suspendCount = $suspendCount;
        }
        if ($escalateCount !== null) {
            $instance->escalateCount = $escalateCount;
        }
        if ($takedownCount !== null) {
            $instance->takedownCount = $takedownCount;
        }

        return $instance;
    }
}
