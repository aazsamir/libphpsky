<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RepoViewDetail implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'repoViewDetail';
    public const ID = 'tools.ozone.moderation.defs';

    public string $did;
    public string $handle;
    public ?string $email = null;

    /** @var array<mixed> */
    public array $relatedRecords = [];
    public string $indexedAt;
    public ?ModerationDetail $moderation = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode>|null */
    public ?array $invites = [];
    public ?bool $invitesDisabled = null;
    public ?string $inviteNote = null;
    public ?string $emailConfirmedAt = null;
    public ?string $deactivatedAt = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\ThreatSignature>|null */
    public ?array $threatSignatures = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<mixed> $relatedRecords
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label> $labels
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode> $invites
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\ThreatSignature> $threatSignatures
     */
    public static function new(
        string $did,
        string $handle,
        array $relatedRecords,
        string $indexedAt,
        ?string $email = null,
        ?ModerationDetail $moderation = null,
        ?array $labels = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null,
        ?array $invites = null,
        ?bool $invitesDisabled = null,
        ?string $inviteNote = null,
        ?string $emailConfirmedAt = null,
        ?string $deactivatedAt = null,
        ?array $threatSignatures = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->relatedRecords = $relatedRecords;
        $instance->indexedAt = $indexedAt;
        $instance->email = $email;
        $instance->moderation = $moderation;
        $instance->labels = $labels;
        $instance->invitedBy = $invitedBy;
        $instance->invites = $invites;
        $instance->invitesDisabled = $invitesDisabled;
        $instance->inviteNote = $inviteNote;
        $instance->emailConfirmedAt = $emailConfirmedAt;
        $instance->deactivatedAt = $deactivatedAt;
        $instance->threatSignatures = $threatSignatures;

        return $instance;
    }
}
