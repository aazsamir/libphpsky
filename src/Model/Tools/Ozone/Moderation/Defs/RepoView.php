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
        ?array $threatSignatures = [],
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->handle = $handle;
        $instance->relatedRecords = $relatedRecords;
        $instance->indexedAt = $indexedAt;
        $instance->moderation = $moderation;
        if ($email !== null) {
            $instance->email = $email;
        }
        if ($invitedBy !== null) {
            $instance->invitedBy = $invitedBy;
        }
        if ($invitesDisabled !== null) {
            $instance->invitesDisabled = $invitesDisabled;
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
