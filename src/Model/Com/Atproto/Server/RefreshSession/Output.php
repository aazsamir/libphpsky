<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\RefreshSession;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.refreshSession';

    public string $accessJwt;
    public string $refreshJwt;
    public string $handle;
    public string $did;
    public mixed $didDoc;
    public ?bool $active;
    public ?string $status;

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
        ?bool $active = null,
        ?string $status = null,
    ): self {
        $instance = new self();
        $instance->accessJwt = $accessJwt;
        $instance->refreshJwt = $refreshJwt;
        $instance->handle = $handle;
        $instance->did = $did;
        if ($didDoc !== null) {
            $instance->didDoc = $didDoc;
        }
        if ($active !== null) {
            $instance->active = $active;
        }
        if ($status !== null) {
            $instance->status = $status;
        }

        return $instance;
    }
}
