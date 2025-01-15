<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetSession;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.getSession';

    public string $handle;
    public string $did;
    public ?string $email = null;
    public ?bool $emailConfirmed = null;
    public ?bool $emailAuthFactor = null;
    public mixed $didDoc = null;
    public ?bool $active = null;
    public ?string $status = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $handle,
        string $did,
        ?string $email = null,
        ?bool $emailConfirmed = null,
        ?bool $emailAuthFactor = null,
        mixed $didDoc = null,
        ?bool $active = null,
        ?string $status = null,
    ): self {
        $instance = new self();
        $instance->handle = $handle;
        $instance->did = $did;
        $instance->email = $email;
        $instance->emailConfirmed = $emailConfirmed;
        $instance->emailAuthFactor = $emailAuthFactor;
        $instance->didDoc = $didDoc;
        $instance->active = $active;
        $instance->status = $status;

        return $instance;
    }
}
