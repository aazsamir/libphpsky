<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\UpdateActorAccess;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.moderation.updateActorAccess';

    public string $actor;
    public bool $allowAccess;
    public ?string $ref;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $actor, bool $allowAccess, ?string $ref = null): self
    {
        $instance = new self();
        $instance->actor = $actor;
        $instance->allowAccess = $allowAccess;
        $instance->ref = $ref;

        return $instance;
    }
}
