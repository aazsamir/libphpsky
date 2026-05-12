<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\GetLiveStats;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.report.getLiveStats';

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\LiveStats Statistics for the requested filter. */
    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\LiveStats $stats;

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

    public static function new(?\Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\LiveStats $stats = null): self
    {
        $instance = new self();
        if ($stats !== null) {
            $instance->stats = $stats;
        }

        return $instance;
    }
}
