<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * object
 */
class StandingRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'standingRef';
    public const ID = 'tools.ozone.inbox.defs';

    public string $standing;
    public ?string $previousStanding;

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
        return ['standing'];
    }

    public static function new(string $standing, ?string $previousStanding = null): self
    {
        $instance = new self();
        $instance->standing = $standing;
        if ($previousStanding !== null) {
            $instance->previousStanding = $previousStanding;
        }

        return $instance;
    }
}
