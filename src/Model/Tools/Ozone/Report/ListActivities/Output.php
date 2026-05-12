<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\ListActivities;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.report.listActivities';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportActivityView> */
    public array $activities = [];
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
        return ['activities'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportActivityView> $activities
     */
    public static function new(array $activities, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->activities = $activities;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
