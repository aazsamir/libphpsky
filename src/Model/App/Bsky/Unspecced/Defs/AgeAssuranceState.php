<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs;

/**
 * The computed state of the age assurance process, returned to the user in question on certain authenticated requests.
 * object
 */
class AgeAssuranceState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'ageAssuranceState';
    public const ID = 'app.bsky.unspecced.defs';

    /** @var ?\DateTimeInterface The timestamp when this state was last updated. */
    public ?\DateTimeInterface $lastInitiatedAt;

    /** @var string The status of the age assurance process. */
    public string $status;

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
        return ['status'];
    }

    public static function new(string $status, ?\DateTimeInterface $lastInitiatedAt = null): self
    {
        $instance = new self();
        $instance->status = $status;
        if ($lastInitiatedAt !== null) {
            $instance->lastInitiatedAt = $lastInitiatedAt;
        }

        return $instance;
    }
}
