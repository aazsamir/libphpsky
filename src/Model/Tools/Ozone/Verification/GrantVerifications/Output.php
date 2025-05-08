<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.verification.grantVerifications';

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\Defs\VerificationView> */
    public array $verifications = [];

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications\GrantError> */
    public array $failedVerifications = [];

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
        return ['verifications', 'failedVerifications'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\Defs\VerificationView> $verifications
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications\GrantError> $failedVerifications
     */
    public static function new(array $verifications, array $failedVerifications): self
    {
        $instance = new self();
        $instance->verifications = $verifications;
        $instance->failedVerifications = $failedVerifications;

        return $instance;
    }
}
