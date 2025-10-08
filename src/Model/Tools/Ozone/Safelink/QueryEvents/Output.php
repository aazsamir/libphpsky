<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\QueryEvents;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.safelink.queryEvents';

    /** @var ?string Next cursor for pagination. Only present if there are more results. */
    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\Defs\Event> */
    public array $events = [];

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
        return ['events'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\Defs\Event> $events
     */
    public static function new(array $events, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->events = $events;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
