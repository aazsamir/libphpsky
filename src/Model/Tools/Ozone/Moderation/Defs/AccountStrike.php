<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Strike information for an account
 * object
 */
class AccountStrike implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'accountStrike';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var ?int Current number of active strikes (excluding expired strikes) */
    public ?int $activeStrikeCount;

    /** @var ?int Total number of strikes ever received (including expired strikes) */
    public ?int $totalStrikeCount;

    /** @var ?\DateTimeInterface Timestamp of the first strike received */
    public ?\DateTimeInterface $firstStrikeAt;

    /** @var ?\DateTimeInterface Timestamp of the most recent strike received */
    public ?\DateTimeInterface $lastStrikeAt;

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
        ?int $activeStrikeCount = null,
        ?int $totalStrikeCount = null,
        ?\DateTimeInterface $firstStrikeAt = null,
        ?\DateTimeInterface $lastStrikeAt = null,
    ): self {
        $instance = new self();
        if ($activeStrikeCount !== null) {
            $instance->activeStrikeCount = $activeStrikeCount;
        }
        if ($totalStrikeCount !== null) {
            $instance->totalStrikeCount = $totalStrikeCount;
        }
        if ($firstStrikeAt !== null) {
            $instance->firstStrikeAt = $firstStrikeAt;
        }
        if ($lastStrikeAt !== null) {
            $instance->lastStrikeAt = $lastStrikeAt;
        }

        return $instance;
    }
}
