<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Moderation\UpdateActorAccess;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.moderation.updateActorAccess';

    public string $actor;
    public bool $allowAccess;
    public ?string $ref = null;

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
