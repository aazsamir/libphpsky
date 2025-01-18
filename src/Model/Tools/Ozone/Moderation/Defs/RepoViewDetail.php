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
    public ?string $email;

    /** @var array<mixed> */
    public array $relatedRecords = [];
    public \DateTimeInterface $indexedAt;
    public ?ModerationDetail $moderation;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode>|null */
    public ?array $invites = [];
    public ?bool $invitesDisabled;
    public ?string $inviteNote;
    public ?\DateTimeInterface $emailConfirmedAt;
    public ?\DateTimeInterface $deactivatedAt;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\ThreatSignature>|null */
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
        return ['did', 'handle', 'relatedRecords', 'indexedAt', 'moderation'];
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
        ?array $labels = [],
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null,
        ?array $invites = [],
        ?bool $invitesDisabled = null,
        ?string $inviteNote = null,
        ?\DateTimeInterface $emailConfirmedAt = null,
        ?\DateTimeInterface $deactivatedAt = null,
        ?array $threatSignatures = [],
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->relatedRecords = $relatedRecords;
        $instance->indexedAt = $indexedAt;
        if ($email !== null) {
            $instance->email = $email;
        }
        if ($moderation !== null) {
            $instance->moderation = $moderation;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
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
        if ($inviteNote !== null) {
            $instance->inviteNote = $inviteNote;
        }
        if ($emailConfirmedAt !== null) {
            $instance->emailConfirmedAt = $emailConfirmedAt;
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
