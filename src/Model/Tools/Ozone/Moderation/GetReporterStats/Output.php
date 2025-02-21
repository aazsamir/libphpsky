<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetReporterStats;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.getReporterStats';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ReporterStats> */
    public array $stats = [];

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

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ReporterStats> $stats
     */
    public static function new(array $stats): self
    {
        $instance = new self();
        $instance->stats = $stats;

        return $instance;
    }
}
