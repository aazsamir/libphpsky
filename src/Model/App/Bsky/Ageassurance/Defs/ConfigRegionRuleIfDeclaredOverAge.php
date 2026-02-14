<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs;

/**
 * Age Assurance rule that applies if the user has declared themselves equal-to or over a certain age.
 * object
 */
class ConfigRegionRuleIfDeclaredOverAge implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'configRegionRuleIfDeclaredOverAge';
    public const ID = 'app.bsky.ageassurance.defs';

    /** @var int The age threshold as a whole integer. */
    public int $age;
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
        return ['age', 'access'];
    }

    public static function new(int $age, string $access): self
    {
        $instance = new self();
        $instance->age = $age;
        $instance->access = $access;

        return $instance;
    }
}
