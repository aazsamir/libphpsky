<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * Read-only preference containing value(s) inferred from the user's declared birthdate. Absence of this preference object in the response indicates that the user has not made a declaration.
 * object
 */
class DeclaredAgePref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'declaredAgePref';
    public const ID = 'app.bsky.actor.defs';

    /** @var ?bool Indicates if the user has declared that they are over 13 years of age. */
    public ?bool $isOverAge13;

    /** @var ?bool Indicates if the user has declared that they are over 16 years of age. */
    public ?bool $isOverAge16;

    /** @var ?bool Indicates if the user has declared that they are over 18 years of age. */
    public ?bool $isOverAge18;

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

    public static function new(?bool $isOverAge13 = null, ?bool $isOverAge16 = null, ?bool $isOverAge18 = null): self
    {
        $instance = new self();
        if ($isOverAge13 !== null) {
            $instance->isOverAge13 = $isOverAge13;
        }
        if ($isOverAge16 !== null) {
            $instance->isOverAge16 = $isOverAge16;
        }
        if ($isOverAge18 !== null) {
            $instance->isOverAge18 = $isOverAge18;
        }

        return $instance;
    }
}
