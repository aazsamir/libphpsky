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

    /** @var array<mixed>|null */
    public ?array $relatedRecords = [];
    public \DateTimeInterface $indexedAt;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode>|null */
    public ?array $invites = [];
    public ?bool $invitesDisabled;
    public ?\DateTimeInterface $emailConfirmedAt;
    public ?string $inviteNote;
    public ?\DateTimeInterface $deactivatedAt;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\ThreatSignature>|null */
    public ?array $threatSignatures = [];

    public static function id(): string
    {
        return self::ID;
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
        $instance->email = $email;
        $instance->relatedRecords = $relatedRecords;
        $instance->invitedBy = $invitedBy;
        $instance->invites = $invites;
        $instance->invitesDisabled = $invitesDisabled;
        $instance->emailConfirmedAt = $emailConfirmedAt;
        $instance->inviteNote = $inviteNote;
        $instance->deactivatedAt = $deactivatedAt;
        $instance->threatSignatures = $threatSignatures;

        return $instance;
    }
}
