<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RepoView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'repoView';
    public const ID = 'tools.ozone.moderation.defs';

    public string $did;
    public string $handle;
    public ?string $email = null;

    /** @var array<mixed> */
    public array $relatedRecords = [];
    public string $indexedAt;
    public Moderation $moderation;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null;
    public ?bool $invitesDisabled = null;
    public ?string $inviteNote = null;
    public ?string $deactivatedAt = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\ThreatSignature>|null */
    public ?array $threatSignatures = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<mixed> $relatedRecords
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\ThreatSignature> $threatSignatures
     */
    public static function new(
        string $did,
        string $handle,
        array $relatedRecords,
        string $indexedAt,
        Moderation $moderation,
        ?string $email = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null,
        ?bool $invitesDisabled = null,
        ?string $inviteNote = null,
        ?string $deactivatedAt = null,
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
