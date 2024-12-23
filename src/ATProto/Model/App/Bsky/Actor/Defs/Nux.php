<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class Nux implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'nux';
    public const ID = 'app.bsky.actor.defs';

    public string $id;
    public bool $completed;
    public ?string $data = null;
    public ?string $expiresAt = null;

    public static function id(): string
    {
        return self::ID;
    }
}
