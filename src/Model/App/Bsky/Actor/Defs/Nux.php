<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * A new user experiences (NUX) storage object
 * object
 */
class Nux implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'nux';
    public const ID = 'app.bsky.actor.defs';

    public string $id;
    public bool $completed;

    /** @var ?string Arbitrary data for the NUX. The structure is defined by the NUX itself. Limited to 300 characters. */
    public ?string $data;

    /** @var ?\DateTimeInterface The date and time at which the NUX will expire and should be considered completed. */
    public ?\DateTimeInterface $expiresAt;

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
        return ['id', 'completed'];
    }

    public static function new(
        string $id,
        bool $completed,
        ?string $data = null,
        ?\DateTimeInterface $expiresAt = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->completed = $completed;
        if ($data !== null) {
            $instance->data = $data;
        }
        if ($expiresAt !== null) {
            $instance->expiresAt = $expiresAt;
        }

        return $instance;
    }
}
