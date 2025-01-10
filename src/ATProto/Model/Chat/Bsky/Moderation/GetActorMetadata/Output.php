<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Moderation\GetActorMetadata;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.moderation.getActorMetadata';

    public ?Metadata $day = null;
    public ?Metadata $month = null;
    public ?Metadata $all = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?Metadata $day = null, ?Metadata $month = null, ?Metadata $all = null): self
    {
        $instance = new self();
        $instance->day = $day;
        $instance->month = $month;
        $instance->all = $all;

        return $instance;
    }
}
