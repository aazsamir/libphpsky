<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class MutedWord implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'mutedWord';
    public const ID = 'app.bsky.actor.defs';

    public ?string $id;
    public string $value;

    /** @var array<string> */
    public array $targets = [];
    public ?string $actorTarget;
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
        return ['value', 'targets'];
    }

    /**
     * @param array<string> $targets
     */
    public static function new(
        string $value,
        array $targets,
        ?string $id = null,
        ?string $actorTarget = null,
        ?\DateTimeInterface $expiresAt = null,
    ): self {
        $instance = new self();
        $instance->value = $value;
        $instance->targets = $targets;
        if ($id !== null) {
            $instance->id = $id;
        }
        if ($actorTarget !== null) {
            $instance->actorTarget = $actorTarget;
        }
        if ($expiresAt !== null) {
            $instance->expiresAt = $expiresAt;
        }

        return $instance;
    }
}
