<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetAccountTimeline;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.getAccountTimeline';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetAccountTimeline\TimelineItem> */
    public array $timeline = [];

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
        return ['timeline'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\GetAccountTimeline\TimelineItem> $timeline
     */
    public static function new(array $timeline): self
    {
        $instance = new self();
        $instance->timeline = $timeline;

        return $instance;
    }
}
