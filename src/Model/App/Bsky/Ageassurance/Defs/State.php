<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs;

/**
 * The user's computed Age Assurance state.
 * object
 */
class State implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'state';
    public const ID = 'app.bsky.ageassurance.defs';

    /** @var ?\DateTimeInterface The timestamp when this state was last updated. */
    public ?\DateTimeInterface $lastInitiatedAt;
    public string $status;
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
        return ['status', 'access'];
    }

    public static function new(string $status, string $access, ?\DateTimeInterface $lastInitiatedAt = null): self
    {
        $instance = new self();
        $instance->status = $status;
        $instance->access = $access;
        if ($lastInitiatedAt !== null) {
            $instance->lastInitiatedAt = $lastInitiatedAt;
        }

        return $instance;
    }
}
