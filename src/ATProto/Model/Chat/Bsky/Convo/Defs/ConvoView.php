<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class ConvoView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'convoView';
    public const ID = 'chat.bsky.convo.defs';

    public string $id;
    public string $rev;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic[] */
    public array $members = [];
    public mixed $lastMessage = null;
    public bool $muted;
    public ?bool $opened = null;
    public int $unreadCount;

    public static function id(): string
    {
        return self::ID;
    }
}
