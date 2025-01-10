<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs;

/**
 * object
 */
class AccountView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'accountView';
    public const ID = 'com.atproto.admin.defs';

    public string $did;
    public string $handle;
    public ?string $email = null;

    /** @var mixed[] */
    public ?array $relatedRecords = [];
    public string $indexedAt;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode[] */
    public ?array $invites = [];
    public ?bool $invitesDisabled = null;
    public ?string $emailConfirmedAt = null;
    public ?string $inviteNote = null;
    public ?string $deactivatedAt = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\ThreatSignature[] */
    public ?array $threatSignatures = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param mixed[] $relatedRecords
     * @param \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode[] $invites
     * @param \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\ThreatSignature[] $threatSignatures
     */
    public static function new(
        string $did,
        string $handle,
        string $indexedAt,
        ?string $email = null,
        ?array $relatedRecords = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null,
        ?array $invites = null,
        ?bool $invitesDisabled = null,
        ?string $emailConfirmedAt = null,
        ?string $inviteNote = null,
        ?string $deactivatedAt = null,
        ?array $threatSignatures = null,
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
