<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetSession;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.getSession';

    public string $handle;
    public string $did;
    public ?string $email;
    public ?bool $emailConfirmed;
    public ?bool $emailAuthFactor;
    public mixed $didDoc;
    public ?bool $active;

    /** @var ?string If active=false, this optional field indicates a possible reason for why the account is not active. If active=false and no status is supplied, then the host makes no claim for why the repository is no longer being hosted. */
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
        return ['handle', 'did'];
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
        if ($email !== null) {
            $instance->email = $email;
        }
        if ($emailConfirmed !== null) {
            $instance->emailConfirmed = $emailConfirmed;
        }
        if ($emailAuthFactor !== null) {
            $instance->emailAuthFactor = $emailAuthFactor;
        }
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
