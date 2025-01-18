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

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['did'];
    }

    public static function new(string $did, ?bool $disabled = null, ?string $role = null): self
    {
        $instance = new self();
        $instance->did = $did;
        if ($disabled !== null) {
            $instance->disabled = $disabled;
        }
        if ($role !== null) {
            $instance->role = $role;
        }

        return $instance;
    }
}
