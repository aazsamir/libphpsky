<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs;

/**
 * Age Assurance rule that applies by default.
 * object
 */
class ConfigRegionRuleDefault implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'configRegionRuleDefault';
    public const ID = 'app.bsky.ageassurance.defs';

    public string $access;

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
        return ['access'];
    }

    public static function new(string $access): self
    {
        $instance = new self();
        $instance->access = $access;

        return $instance;
    }
}
