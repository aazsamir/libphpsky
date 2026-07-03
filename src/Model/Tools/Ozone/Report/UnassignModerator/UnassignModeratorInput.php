<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\UnassignModerator;

/**
 * object
 */
class UnassignModeratorInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.report.unassignModerator';

    /** @var int The ID of the report to unassign. */
    public int $reportId;

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
        return ['reportId'];
    }

    public static function new(int $reportId): self
    {
        $instance = new self();
        $instance->reportId = $reportId;

        return $instance;
    }
}
