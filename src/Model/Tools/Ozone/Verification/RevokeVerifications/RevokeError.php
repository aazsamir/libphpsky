<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\RevokeVerifications;

/**
 * Error object for failed revocations
 * object
 */
class RevokeError implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'revokeError';
    public const ID = 'tools.ozone.verification.revokeVerifications';

    /** @var string The AT-URI of the verification record that failed to revoke. */
    public string $uri;

    /** @var string Description of the error that occurred during revocation. */
    public string $error;

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
        return ['uri', 'error'];
    }

    public static function new(string $uri, string $error): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->error = $error;

        return $instance;
    }
}
