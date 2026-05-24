<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Site\Standard\Document;

/**
 * object
 */
class Contributor implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'contributor';
    public const ID = 'site.standard.document';

    public string $did;
    public ?string $displayName;
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

    public static function new(string $did, ?string $displayName = null, ?string $role = null): self
    {
        $instance = new self();
        $instance->did = $did;
        if ($displayName !== null) {
            $instance->displayName = $displayName;
        }
        if ($role !== null) {
            $instance->role = $role;
        }

        return $instance;
    }
}
