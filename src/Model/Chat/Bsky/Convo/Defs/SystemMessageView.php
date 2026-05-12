<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here].
 * object
 */
class SystemMessageView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'systemMessageView';
    public const ID = 'chat.bsky.convo.defs';

    public string $id;
    public string $rev;
    public \DateTimeInterface $sentAt;

    /** @var \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataAddMember|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataRemoveMember|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataMemberJoin|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataMemberLeave|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataLockConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataUnlockConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataLockConvoPermanently|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataEditGroup|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataCreateJoinLink|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataEditJoinLink|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataEnableJoinLink|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageDataDisableJoinLink */
    public mixed $data;

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
        return ['id', 'rev', 'sentAt', 'data'];
    }

    public static function new(
        string $id,
        string $rev,
        \DateTimeInterface $sentAt,
        SystemMessageDataAddMember|SystemMessageDataRemoveMember|SystemMessageDataMemberJoin|SystemMessageDataMemberLeave|SystemMessageDataLockConvo|SystemMessageDataUnlockConvo|SystemMessageDataLockConvoPermanently|SystemMessageDataEditGroup|SystemMessageDataCreateJoinLink|SystemMessageDataEditJoinLink|SystemMessageDataEnableJoinLink|SystemMessageDataDisableJoinLink $data,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->rev = $rev;
        $instance->sentAt = $sentAt;
        $instance->data = $data;

        return $instance;
    }
}
