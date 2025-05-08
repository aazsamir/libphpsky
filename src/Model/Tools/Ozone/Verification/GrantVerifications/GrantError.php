<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications;

/**
 * Error object for failed verifications.
 * object
 */
class GrantError implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'grantError';
    public const ID = 'tools.ozone.verification.grantVerifications';

    /** @var string Error message describing the reason for failure. */
    public string $error;

    /** @var string The did of the subject being verified */
    public string $subject;

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
        return ['error', 'subject'];
    }

    public static function new(string $error, string $subject): self
    {
        $instance = new self();
        $instance->error = $error;
        $instance->subject = $subject;

        return $instance;
    }
}
