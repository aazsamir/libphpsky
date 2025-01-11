<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class MutedWord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mutedWord';
    public const ID = 'app.bsky.actor.defs';

    public ?string $id = null;
    public string $value;

    /** @var array<string> */
    public array $targets = [];
    public ?string $actorTarget = null;
    public ?string $expiresAt = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $targets
     */
    public static function new(
        string $value,
        array $targets,
        ?string $id = null,
        ?string $actorTarget = null,
        ?string $expiresAt = null,
    ): self {
        $instance = new self();
        $instance->value = $value;
        $instance->targets = $targets;
        $instance->id = $id;
        $instance->actorTarget = $actorTarget;
        $instance->expiresAt = $expiresAt;

        return $instance;
    }
}
