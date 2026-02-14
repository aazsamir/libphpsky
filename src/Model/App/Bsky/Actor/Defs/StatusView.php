<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class StatusView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'statusView';
    public const ID = 'app.bsky.actor.defs';

    public ?string $uri;
    public ?string $cid;

    /** @var string The status for the account. */
    public string $status;
    public mixed $record;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\View|null An optional embed associated with the status. */
    public mixed $embed;

    /** @var ?\DateTimeInterface The date when this status will expire. The application might choose to no longer return the status after expiration. */
    public ?\DateTimeInterface $expiresAt;

    /** @var ?bool True if the status is not expired, false if it is expired. Only present if expiration was set. */
    public ?bool $isActive;

    /** @var ?bool True if the user's go-live access has been disabled by a moderator, false otherwise. */
    public ?bool $isDisabled;

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
        return ['status', 'record'];
    }

    public static function new(
        string $status,
        mixed $record,
        ?string $uri = null,
        ?string $cid = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\View $embed = null,
        ?\DateTimeInterface $expiresAt = null,
        ?bool $isActive = null,
        ?bool $isDisabled = null,
    ): self {
        $instance = new self();
        $instance->status = $status;
        $instance->record = $record;
        if ($uri !== null) {
            $instance->uri = $uri;
        }
        if ($cid !== null) {
            $instance->cid = $cid;
        }
        if ($embed !== null) {
            $instance->embed = $embed;
        }
        if ($expiresAt !== null) {
            $instance->expiresAt = $expiresAt;
        }
        if ($isActive !== null) {
            $instance->isActive = $isActive;
        }
        if ($isDisabled !== null) {
            $instance->isDisabled = $isDisabled;
        }

        return $instance;
    }
}
