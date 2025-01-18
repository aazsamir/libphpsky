<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RepoView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'repoView';
    public const ID = 'tools.ozone.moderation.defs';

    public string $did;
    public string $handle;
    public ?string $email;

    /** @var array<mixed> */
    public array $relatedRecords = [];
    public \DateTimeInterface $indexedAt;
    public Moderation $moderation;
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy;
    public ?bool $invitesDisabled;
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
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs\ThreatSignature> $threatSignatures
     */
    public static function new(
        string $did,
        string $handle,
        array $relatedRecords,
        \DateTimeInterface $indexedAt,
        Moderation $moderation,
        ?string $email = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null,
        ?bool $invitesDisabled = null,
        ?string $inviteNote = null,
        ?\DateTimeInterface $deactivatedAt = null,
        ?array $threatSignatures = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->relatedRecords = $relatedRecords;
        $instance->indexedAt = $indexedAt;
        $instance->moderation = $moderation;
        $instance->email = $email;
        $instance->invitedBy = $invitedBy;
        $instance->invitesDisabled = $invitesDisabled;
        $instance->inviteNote = $inviteNote;
        $instance->deactivatedAt = $deactivatedAt;
        $instance->threatSignatures = $threatSignatures;

        return $instance;
    }
}
