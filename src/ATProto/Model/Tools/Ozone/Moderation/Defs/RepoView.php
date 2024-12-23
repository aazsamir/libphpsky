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

    /** @var mixed[] */
    public array $relatedRecords = [];
    public string $indexedAt;
    public Moderation $moderation;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\Defs\InviteCode $invitedBy = null;
    public ?bool $invitesDisabled = null;
    public ?string $inviteNote = null;
    public ?string $deactivatedAt = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs\ThreatSignature[] */
    public ?array $threatSignatures = [];

    public static function id(): string
    {
        return self::ID;
    }
}
