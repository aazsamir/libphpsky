<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\RevokeVerifications;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.verification.revokeVerifications';

    /** @var array<string> Array of verification record uris to revoke */
    public array $uris = [];

    /** @var ?string Reason for revoking the verification. This is optional and can be omitted if not needed. */
    public ?string $revokeReason;

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
        return ['uris'];
    }

    /**
     * @param array<string> $uris
     */
    public static function new(array $uris, ?string $revokeReason = null): self
    {
        $instance = new self();
        $instance->uris = $uris;
        if ($revokeReason !== null) {
            $instance->revokeReason = $revokeReason;
        }

        return $instance;
    }
}
