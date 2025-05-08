<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.verification.grantVerifications';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications\VerificationInput> Array of verification requests to process */
    public array $verifications = [];

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
        return ['verifications'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications\VerificationInput> $verifications
     */
    public static function new(array $verifications): self
    {
        $instance = new self();
        $instance->verifications = $verifications;

        return $instance;
    }
}
