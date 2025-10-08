<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ListScheduledActions;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.moderation.listScheduledActions';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ScheduledActionView> */
    public array $actions = [];

    /** @var ?string Cursor for next page of results */
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
        return ['actions'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ScheduledActionView> $actions
     */
    public static function new(array $actions, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->actions = $actions;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
