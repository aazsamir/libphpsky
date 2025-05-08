<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\RevokeVerifications;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.verification.revokeVerifications';

    /** @var array<string> List of verification uris successfully revoked */
    public array $revokedVerifications = [];

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\RevokeVerifications\RevokeError> List of verification uris that couldn't be revoked, including failure reasons */
    public array $failedRevocations = [];

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
        return ['revokedVerifications', 'failedRevocations'];
    }

    /**
     * @param array<string> $revokedVerifications
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\RevokeVerifications\RevokeError> $failedRevocations
     */
    public static function new(array $revokedVerifications, array $failedRevocations): self
    {
        $instance = new self();
        $instance->revokedVerifications = $revokedVerifications;
        $instance->failedRevocations = $failedRevocations;

        return $instance;
    }
}
