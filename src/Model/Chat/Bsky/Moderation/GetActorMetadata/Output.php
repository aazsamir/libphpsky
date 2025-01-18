<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\GetActorMetadata;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.moderation.getActorMetadata';

    public ?Metadata $day;
    public ?Metadata $month;
    public ?Metadata $all;

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
        return ['day', 'month', 'all'];
    }

    public static function new(?Metadata $day = null, ?Metadata $month = null, ?Metadata $all = null): self
    {
        $instance = new self();
        if ($day !== null) {
            $instance->day = $day;
        }
        if ($month !== null) {
            $instance->month = $month;
        }
        if ($all !== null) {
            $instance->all = $all;
        }

        return $instance;
    }
}
