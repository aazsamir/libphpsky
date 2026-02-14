<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs;

/**
 * Object used to store Age Assurance data in stash.
 * object
 */
class Event implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'event';
    public const ID = 'app.bsky.ageassurance.defs';

    /** @var \DateTimeInterface The date and time of this write operation. */
    public \DateTimeInterface $createdAt;

    /** @var string The unique identifier for this instance of the Age Assurance flow, in UUID format. */
    public string $attemptId;

    /** @var string The status of the Age Assurance process. */
    public string $status;

    /** @var string The access level granted based on Age Assurance data we've processed. */
    public string $access;

    /** @var string The ISO 3166-1 alpha-2 country code provided when beginning the Age Assurance flow. */
    public string $countryCode;

    /** @var ?string The ISO 3166-2 region code provided when beginning the Age Assurance flow. */
    public ?string $regionCode;

    /** @var ?string The email used for Age Assurance. */
    public ?string $email;

    /** @var ?string The IP address used when initiating the Age Assurance flow. */
    public ?string $initIp;

    /** @var ?string The user agent used when initiating the Age Assurance flow. */
    public ?string $initUa;

    /** @var ?string The IP address used when completing the Age Assurance flow. */
    public ?string $completeIp;

    /** @var ?string The user agent used when completing the Age Assurance flow. */
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
        return ['createdAt', 'status', 'access', 'attemptId', 'countryCode'];
    }

    public static function new(
        \DateTimeInterface $createdAt,
        string $attemptId,
        string $status,
        string $access,
        string $countryCode,
        ?string $regionCode = null,
        ?string $email = null,
        ?string $initIp = null,
        ?string $initUa = null,
        ?string $completeIp = null,
        ?string $completeUa = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->attemptId = $attemptId;
        $instance->status = $status;
        $instance->access = $access;
        $instance->countryCode = $countryCode;
        if ($regionCode !== null) {
            $instance->regionCode = $regionCode;
        }
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
