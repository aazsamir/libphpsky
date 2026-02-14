<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs;

/**
 * Additional metadata needed to compute Age Assurance state client-side.
 * object
 */
class StateMetadata implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'stateMetadata';
    public const ID = 'app.bsky.ageassurance.defs';

    /** @var ?\DateTimeInterface The account creation timestamp. */
    public ?\DateTimeInterface $accountCreatedAt;

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

    public static function new(?\DateTimeInterface $accountCreatedAt = null): self
    {
        $instance = new self();
        if ($accountCreatedAt !== null) {
            $instance->accountCreatedAt = $accountCreatedAt;
        }

        return $instance;
    }
}
