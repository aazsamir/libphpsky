<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs;

/**
 * object
 */
class AccountView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'accountView';
    public const ID = 'com.atproto.admin.defs';

    public string $did;
    public string $handle;
    public ?string $email;

    /** @var ?array<mixed> */
    public ?array $relatedRecords = [];
    public \DateTimeInterface $indexedAt;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode> */
    public ?array $invites = [];
    public ?bool $invitesDisabled;
    public ?\DateTimeInterface $emailConfirmedAt;
    public ?string $inviteNote;
    public ?\DateTimeInterface $deactivatedAt;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\ThreatSignature> */
    public ?array $threatSignatures = [];

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
        return ['did', 'handle', 'indexedAt'];
    }

    /**
     * @param array<mixed> $relatedRecords
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode> $invites
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\ThreatSignature> $threatSignatures
     */
    public static function new(
        string $did,
        string $handle,
        \DateTimeInterface $indexedAt,
        ?string $email = null,
        ?array $relatedRecords = [],
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null,
        ?array $invites = [],
        ?bool $invitesDisabled = null,
        ?\DateTimeInterface $emailConfirmedAt = null,
        ?string $inviteNote = null,
        ?\DateTimeInterface $deactivatedAt = null,
        ?array $threatSignatures = [],
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->indexedAt = $indexedAt;
        if ($email !== null) {
            $instance->email = $email;
        }
        if ($relatedRecords !== null) {
            $instance->relatedRecords = $relatedRecords;
        }
        if ($invitedBy !== null) {
            $instance->invitedBy = $invitedBy;
        }
        if ($invites !== null) {
            $instance->invites = $invites;
        }
        if ($invitesDisabled !== null) {
            $instance->invitesDisabled = $invitesDisabled;
        }
        if ($emailConfirmedAt !== null) {
            $instance->emailConfirmedAt = $emailConfirmedAt;
        }
        if ($inviteNote !== null) {
            $instance->inviteNote = $inviteNote;
        }
        if ($deactivatedAt !== null) {
            $instance->deactivatedAt = $deactivatedAt;
        }
        if ($threatSignatures !== null) {
            $instance->threatSignatures = $threatSignatures;
        }

        return $instance;
    }
}
