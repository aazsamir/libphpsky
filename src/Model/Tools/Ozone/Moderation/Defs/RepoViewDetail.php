<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RepoViewDetail implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'repoViewDetail';
    public const ID = 'tools.ozone.moderation.defs';

    public string $did;
    public string $handle;
    public ?string $email = null;

    /** @var array<mixed> */
    public array $relatedRecords = [];
    public \DateTimeInterface $indexedAt;
    public ?ModerationDetail $moderation = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode>|null */
    public ?array $invites = [];
    public ?bool $invitesDisabled = null;
    public ?string $inviteNote = null;
    public ?\DateTimeInterface $emailConfirmedAt = null;
    public ?\DateTimeInterface $deactivatedAt = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\ThreatSignature>|null */
    public ?array $threatSignatures = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<mixed> $relatedRecords
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode> $invites
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\ThreatSignature> $threatSignatures
     */
    public static function new(
        string $did,
        string $handle,
        array $relatedRecords,
        \DateTimeInterface $indexedAt,
        ?string $email = null,
        ?ModerationDetail $moderation = null,
        ?array $labels = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null,
        ?array $invites = null,
        ?bool $invitesDisabled = null,
        ?string $inviteNote = null,
        ?\DateTimeInterface $emailConfirmedAt = null,
        ?\DateTimeInterface $deactivatedAt = null,
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
