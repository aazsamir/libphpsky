<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.createSession';

    public string $accessJwt;
    public string $refreshJwt;
    public string $handle;
    public string $did;
    public mixed $didDoc = null;
    public ?string $email = null;
    public ?bool $emailConfirmed = null;
    public ?bool $emailAuthFactor = null;
    public ?bool $active = null;
    public ?string $status = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $accessJwt,
        string $refreshJwt,
        string $handle,
        string $did,
        mixed $didDoc = null,
        ?string $email = null,
        ?bool $emailConfirmed = null,
        ?bool $emailAuthFactor = null,
        ?bool $active = null,
        ?string $status = null,
    ): self {
        $instance = new self();
        $instance->accessJwt = $accessJwt;
        $instance->refreshJwt = $refreshJwt;
        $instance->handle = $handle;
        $instance->did = $did;
        $instance->didDoc = $didDoc;
        $instance->email = $email;
        $instance->emailConfirmed = $emailConfirmed;
        $instance->emailAuthFactor = $emailAuthFactor;
        $instance->active = $active;
        $instance->status = $status;

        return $instance;
    }
}
