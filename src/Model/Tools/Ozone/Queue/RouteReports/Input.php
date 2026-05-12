<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\RouteReports;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.queue.routeReports';

    /** @var int Start of report ID range (inclusive). */
    public int $startReportId;

    /** @var int End of report ID range (inclusive). Difference between start and end must be less than 5,000. */
    public int $endReportId;

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
        return ['startReportId', 'endReportId'];
    }

    public static function new(int $startReportId, int $endReportId): self
    {
        $instance = new self();
        $instance->startReportId = $startReportId;
        $instance->endReportId = $endReportId;

        return $instance;
    }
}
