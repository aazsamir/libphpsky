<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Status;

/**
 * object
 */
class Status implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.status';

    /** @var string The status for the account. */
    public string $status;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\External|null An optional embed associated with the status. */
    public mixed $embed;

    /** @var ?int The duration of the status in minutes. Applications can choose to impose minimum and maximum limits. */
    public ?int $durationMinutes;
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
        return ['status', 'createdAt'];
    }

    public static function new(
        string $status,
        \DateTimeInterface $createdAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\External $embed = null,
        ?int $durationMinutes = null,
    ): self {
        $instance = new self();
        $instance->status = $status;
        $instance->createdAt = $createdAt;
        if ($embed !== null) {
            $instance->embed = $embed;
        }
        if ($durationMinutes !== null) {
            $instance->durationMinutes = $durationMinutes;
        }

        return $instance;
    }
}
