<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class PersonalDetailsPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'personalDetailsPref';
    public const ID = 'app.bsky.actor.defs';

    public ?\DateTimeInterface $birthDate = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?\DateTimeInterface $birthDate = null): self
    {
        $instance = new self();
        $instance->birthDate = $birthDate;

        return $instance;
    }
}
