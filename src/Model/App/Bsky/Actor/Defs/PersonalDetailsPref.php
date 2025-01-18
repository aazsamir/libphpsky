<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class PersonalDetailsPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'personalDetailsPref';
    public const ID = 'app.bsky.actor.defs';

    public ?\DateTimeInterface $birthDate;

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
        return [];
    }

    public static function new(?\DateTimeInterface $birthDate = null): self
    {
        $instance = new self();
        if ($birthDate !== null) {
            $instance->birthDate = $birthDate;
        }

        return $instance;
    }
}
