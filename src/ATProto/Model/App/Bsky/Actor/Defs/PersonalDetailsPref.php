<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class PersonalDetailsPref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'personalDetailsPref';
    public const ID = 'app.bsky.actor.defs';

    public ?string $birthDate = null;

    public static function id(): string
    {
        return self::ID;
    }
}
