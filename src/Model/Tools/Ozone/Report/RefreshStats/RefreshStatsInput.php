<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\RefreshStats;

/**
 * object
 */
class RefreshStatsInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.report.refreshStats';

    /** @var string Start date for recomputation, inclusive (YYYY-MM-DD). */
    public string $startDate;

    /** @var string End date for recomputation, inclusive (YYYY-MM-DD). */
    public string $endDate;

    /** @var ?array<int> Optional list of queue IDs to recompute. Omit to recompute all groups. */
    public ?array $queueIds = [];

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
        return ['startDate', 'endDate'];
    }

    /**
     * @param array<int> $queueIds
     */
    public static function new(string $startDate, string $endDate, ?array $queueIds = []): self
    {
        $instance = new self();
        $instance->startDate = $startDate;
        $instance->endDate = $endDate;
        if ($queueIds !== null) {
            $instance->queueIds = $queueIds;
        }

        return $instance;
    }
}
