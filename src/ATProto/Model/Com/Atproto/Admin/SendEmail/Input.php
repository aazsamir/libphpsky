<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\SendEmail;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.sendEmail';

    public string $recipientDid;
    public string $content;
    public ?string $subject = null;
    public string $senderDid;
    public ?string $comment = null;

    public static function id(): string
    {
        return self::ID;
    }
}
