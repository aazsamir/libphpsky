<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\Defs;

/**
 * object
 */
class IdentityInfo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'identityInfo';
    public const ID = 'com.atproto.identity.defs';

    public string $did;

    /** @var string The validated handle of the account; or 'handle.invalid' if the handle did not bi-directionally match the DID document. */
    public string $handle;
    public mixed $didDoc;

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
        return ['did', 'handle', 'didDoc'];
    }

    public static function new(string $did, string $handle, mixed $didDoc): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->didDoc = $didDoc;

        return $instance;
    }
}
