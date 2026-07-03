<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\RouteReports;

/**
 * object
 */
class RouteReportsOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.queue.routeReports';

    /** @var int The number of reports assigned to a queue. */
    public int $assigned;

    /** @var int The number of reports with no matching queue. */
    public int $unmatched;

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
        return ['assigned', 'unmatched'];
    }

    public static function new(int $assigned, int $unmatched): self
    {
        $instance = new self();
        $instance->assigned = $assigned;
        $instance->unmatched = $unmatched;

        return $instance;
    }
}
