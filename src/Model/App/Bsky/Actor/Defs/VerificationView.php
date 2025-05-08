<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * An individual verification for an associated subject.
 * object
 */
class VerificationView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'verificationView';
    public const ID = 'app.bsky.actor.defs';

    /** @var string The user who issued this verification. */
    public string $issuer;

    /** @var string The AT-URI of the verification record. */
    public string $uri;

    /** @var bool True if the verification passes validation, otherwise false. */
    public bool $isValid;

    /** @var \DateTimeInterface Timestamp when the verification was created. */
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
        return ['issuer', 'uri', 'isValid', 'createdAt'];
    }

    public static function new(string $issuer, string $uri, bool $isValid, \DateTimeInterface $createdAt): self
    {
        $instance = new self();
        $instance->issuer = $issuer;
        $instance->uri = $uri;
        $instance->isValid = $isValid;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
