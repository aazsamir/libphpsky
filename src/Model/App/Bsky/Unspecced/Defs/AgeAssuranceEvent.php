<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs;

/**
 * Object used to store age assurance data in stash.
 * object
 */
class AgeAssuranceEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'ageAssuranceEvent';
    public const ID = 'app.bsky.unspecced.defs';

    /** @var \DateTimeInterface The date and time of this write operation. */
    public \DateTimeInterface $createdAt;

    /** @var string The status of the age assurance process. */
    public string $status;

    /** @var string The unique identifier for this instance of the age assurance flow, in UUID format. */
    public string $attemptId;

    /** @var ?string The email used for AA. */
    public ?string $email;

    /** @var ?string The IP address used when initiating the AA flow. */
    public ?string $initIp;

    /** @var ?string The user agent used when initiating the AA flow. */
    public ?string $initUa;

    /** @var ?string The IP address used when completing the AA flow. */
    public ?string $completeIp;

    /** @var ?string The user agent used when completing the AA flow. */
    public ?string $completeUa;

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
        return ['createdAt', 'status', 'attemptId'];
    }

    public static function new(
        \DateTimeInterface $createdAt,
        string $status,
        string $attemptId,
        ?string $email = null,
        ?string $initIp = null,
        ?string $initUa = null,
        ?string $completeIp = null,
        ?string $completeUa = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->status = $status;
        $instance->attemptId = $attemptId;
        if ($email !== null) {
            $instance->email = $email;
        }
        if ($initIp !== null) {
            $instance->initIp = $initIp;
        }
        if ($initUa !== null) {
            $instance->initUa = $initUa;
        }
        if ($completeIp !== null) {
            $instance->completeIp = $completeIp;
        }
        if ($completeUa !== null) {
            $instance->completeUa = $completeUa;
        }

        return $instance;
    }
}
