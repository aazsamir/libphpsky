<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileAssociated implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'profileAssociated';
    public const ID = 'app.bsky.actor.defs';

    public ?int $lists = null;
    public ?int $feedgens = null;
    public ?int $starterPacks = null;
    public ?bool $labeler = null;
    public ?ProfileAssociatedChat $chat = null;

    public static function id(): string
    {
        return self::ID;
    }
}
