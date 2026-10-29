<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetReport;

/**
 * object
 */
class GetReportOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.inbox.getReport';

    public ?ReportView $report;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetReport\ResolutionView Present only when the report is resolved. */
    public ?ResolutionView $resolution;

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

    public static function new(?ReportView $report = null, ?ResolutionView $resolution = null): self
    {
        $instance = new self();
        if ($report !== null) {
            $instance->report = $report;
        }
        if ($resolution !== null) {
            $instance->resolution = $resolution;
        }

        return $instance;
    }
}
