<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetAccountTimeline;

/**
 * object
 */
class TimelineItem implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'timelineItem';
    public const ID = 'tools.ozone.moderation.getAccountTimeline';

    public string $day;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetAccountTimeline\TimelineItemSummary> */
    public array $summary = [];

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
        return ['day', 'summary'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetAccountTimeline\TimelineItemSummary> $summary
     */
    public static function new(string $day, array $summary): self
    {
        $instance = new self();
        $instance->day = $day;
        $instance->summary = $summary;

        return $instance;
    }
}
