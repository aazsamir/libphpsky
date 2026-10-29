<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\UpdateSeen;

/**
 * object
 */
class UpdateSeenOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.inbox.updateSeen';

    /** @var \DateTimeInterface The earliest resulting watermark across the requested sections, in UTC. Every requested section is read through this instant; individual sections may already have newer watermarks. */
    public \DateTimeInterface $seenAt;

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
        return ['seenAt'];
    }

    public static function new(\DateTimeInterface $seenAt): self
    {
        $instance = new self();
        $instance->seenAt = $seenAt;

        return $instance;
    }
}
