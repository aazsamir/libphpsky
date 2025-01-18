<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAccount;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.createAccount';

    public string $accessJwt;
    public string $refreshJwt;
    public string $handle;
    public string $did;
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
        return ['accessJwt', 'refreshJwt', 'handle', 'did'];
    }

    public static function new(
        string $accessJwt,
        string $refreshJwt,
        string $handle,
        string $did,
        mixed $didDoc = null,
    ): self {
        $instance = new self();
        $instance->accessJwt = $accessJwt;
        $instance->refreshJwt = $refreshJwt;
        $instance->handle = $handle;
        $instance->did = $did;
        if ($didDoc !== null) {
            $instance->didDoc = $didDoc;
        }

        return $instance;
    }
}
