<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
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
    public ?string $data;
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
