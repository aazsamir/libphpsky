<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\GetHistoricalStats;

/**
 * object
 */
class GetHistoricalStatsOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.report.getHistoricalStats';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\HistoricalStats> */
    public array $stats = [];
    public ?string $cursor;

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
        return ['stats'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\HistoricalStats> $stats
     */
    public static function new(array $stats, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->stats = $stats;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
