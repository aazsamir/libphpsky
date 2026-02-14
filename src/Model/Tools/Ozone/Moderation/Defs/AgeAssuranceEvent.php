<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Age assurance info coming directly from users. Only works on DID subjects.
 * object
 */
class AgeAssuranceEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'ageAssuranceEvent';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var \DateTimeInterface The date and time of this write operation. */
    public \DateTimeInterface $createdAt;

    /** @var string The unique identifier for this instance of the age assurance flow, in UUID format. */
    public string $attemptId;

    /** @var string The status of the Age Assurance process. */
    public string $status;
    public ?string $access;

    /** @var ?string The ISO 3166-1 alpha-2 country code provided when beginning the Age Assurance flow. */
    public ?string $countryCode;

    /** @var ?string The ISO 3166-2 region code provided when beginning the Age Assurance flow. */
    public ?string $regionCode;

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
        string $attemptId,
        string $status,
        ?string $access = null,
        ?string $countryCode = null,
        ?string $regionCode = null,
        ?string $initIp = null,
        ?string $initUa = null,
        ?string $completeIp = null,
        ?string $completeUa = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->attemptId = $attemptId;
        $instance->status = $status;
        if ($access !== null) {
            $instance->access = $access;
        }
        if ($countryCode !== null) {
            $instance->countryCode = $countryCode;
        }
        if ($regionCode !== null) {
            $instance->regionCode = $regionCode;
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
