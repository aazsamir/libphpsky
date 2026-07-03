<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\QueryReports;

/**
 * object
 */
class QueryReportsOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.report.queryReports';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportView> */
    public array $reports = [];

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
        return ['reports'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportView> $reports
     */
    public static function new(array $reports, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->reports = $reports;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
