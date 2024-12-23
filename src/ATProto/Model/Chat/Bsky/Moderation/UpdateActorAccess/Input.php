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
}
