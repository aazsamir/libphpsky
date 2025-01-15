<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class PersonalDetailsPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'personalDetailsPref';
    public const ID = 'app.bsky.actor.defs';

    public ?string $birthDate = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $birthDate = null): self
    {
        $instance = new self();
        $instance->birthDate = $birthDate;

        return $instance;
    }
}
