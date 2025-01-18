<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Team\AddMember;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.team.addMember';

    public string $did;
    public string $role;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $did, string $role): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->role = $role;

        return $instance;
    }
}
