<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Team\UpdateMember;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.team.updateMember';

    public string $did;
    public ?bool $disabled;
    public ?string $role;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $did, ?bool $disabled = null, ?string $role = null): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->disabled = $disabled;
        $instance->role = $role;

        return $instance;
    }
}
