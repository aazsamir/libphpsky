<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory;

/**
 * object
 */
class Event implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'event';
    public const ID = 'tools.ozone.hosting.getAccountHistory';

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory\AccountCreated|\Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory\EmailUpdated|\Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory\EmailConfirmed|\Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory\PasswordUpdated|\Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory\HandleUpdated */
    public mixed $details;
    public string $createdBy;
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
        return ['details', 'createdBy', 'createdAt'];
    }

    public static function new(
        AccountCreated|EmailUpdated|EmailConfirmed|PasswordUpdated|HandleUpdated $details,
        string $createdBy,
        \DateTimeInterface $createdAt,
    ): self {
        $instance = new self();
        $instance->details = $details;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
