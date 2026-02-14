<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs;

/**
 * Age Assurance rule that applies if the account is equal-to or newer than a certain date.
 * object
 */
class ConfigRegionRuleIfAccountNewerThan implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'configRegionRuleIfAccountNewerThan';
    public const ID = 'app.bsky.ageassurance.defs';

    /** @var \DateTimeInterface The date threshold as a datetime string. */
    public \DateTimeInterface $date;
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
        return ['date', 'access'];
    }

    public static function new(\DateTimeInterface $date, string $access): self
    {
        $instance = new self();
        $instance->date = $date;
        $instance->access = $access;

        return $instance;
    }
}
