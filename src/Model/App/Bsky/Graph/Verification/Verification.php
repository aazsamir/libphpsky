<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Verification;

/**
 * object
 */
class Verification implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.verification';

    /** @var string DID of the subject the verification applies to. */
    public string $subject;

    /** @var string Handle of the subject the verification applies to at the moment of verifying, which might not be the same at the time of viewing. The verification is only valid if the current handle matches the one at the time of verifying. */
    public string $handle;

    /** @var string Display name of the subject the verification applies to at the moment of verifying, which might not be the same at the time of viewing. The verification is only valid if the current displayName matches the one at the time of verifying. */
    public string $displayName;

    /** @var \DateTimeInterface Date of when the verification was created. */
    public \DateTimeInterface $createdAt;

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
        return ['subject', 'handle', 'displayName', 'createdAt'];
    }

    public static function new(
        string $subject,
        string $handle,
        string $displayName,
        \DateTimeInterface $createdAt,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        $instance->handle = $handle;
        $instance->displayName = $displayName;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
