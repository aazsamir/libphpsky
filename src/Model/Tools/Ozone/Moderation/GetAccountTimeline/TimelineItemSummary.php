<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetAccountTimeline;

/**
 * object
 */
class TimelineItemSummary implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'timelineItemSummary';
    public const ID = 'tools.ozone.moderation.getAccountTimeline';

    public string $eventSubjectType;
    public string $eventType;
    public int $count;

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
        return ['eventSubjectType', 'eventType', 'count'];
    }

    public static function new(string $eventSubjectType, string $eventType, int $count): self
    {
        $instance = new self();
        $instance->eventSubjectType = $eventSubjectType;
        $instance->eventType = $eventType;
        $instance->count = $count;

        return $instance;
    }
}
