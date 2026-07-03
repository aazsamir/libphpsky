<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\RouteReports;

/**
 * Route reports within an ID range to matching queues based.
 * procedure
 */
class RouteReports implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.queue.routeReports';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(RouteReportsInput $input): RouteReportsOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\RouteReports\RouteReportsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
