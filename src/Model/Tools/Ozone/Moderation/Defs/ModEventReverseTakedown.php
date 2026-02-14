<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Revert take down action on a subject
 * object
 */
class ModEventReverseTakedown implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventReverseTakedown';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var ?string Describe reasoning behind the reversal. */
    public ?string $comment;

    /** @var ?array<string> Names/Keywords of the policy infraction for which takedown is being reversed. */
    public ?array $policies = [];

    /** @var ?string Severity level of the violation. Usually set from the last policy infraction's severity. */
    public ?string $severityLevel;

    /** @var ?int Number of strikes to subtract from the user's strike count. Usually set from the last policy infraction's severity. */
    public ?int $strikeCount;

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

    /**
     * @param array<string> $policies
     */
    public static function new(
        ?string $comment = null,
        ?array $policies = [],
        ?string $severityLevel = null,
        ?int $strikeCount = null,
    ): self {
        $instance = new self();
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($policies !== null) {
            $instance->policies = $policies;
        }
        if ($severityLevel !== null) {
            $instance->severityLevel = $severityLevel;
        }
        if ($strikeCount !== null) {
            $instance->strikeCount = $strikeCount;
        }

        return $instance;
    }
}
