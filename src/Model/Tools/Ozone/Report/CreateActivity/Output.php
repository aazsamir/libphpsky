<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\CreateActivity;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.report.createActivity';

    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportActivityView $activity;

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
        return ['activity'];
    }

    public static function new(
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportActivityView $activity = null,
    ): self {
        $instance = new self();
        if ($activity !== null) {
            $instance->activity = $activity;
        }

        return $instance;
    }
}
