<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\ReassignQueue;

/**
 * object
 */
class ReassignQueueOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.report.reassignQueue';

    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportView $report;

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
        return ['report'];
    }

    public static function new(?\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportView $report = null): self
    {
        $instance = new self();
        if ($report !== null) {
            $instance->report = $report;
        }

        return $instance;
    }
}
