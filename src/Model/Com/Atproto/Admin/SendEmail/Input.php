<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SendEmail;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

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

    public static function new(
        string $recipientDid,
        string $content,
        string $senderDid,
        ?string $subject = null,
        ?string $comment = null,
    ): self {
        $instance = new self();
        $instance->recipientDid = $recipientDid;
        $instance->content = $content;
        $instance->senderDid = $senderDid;
        $instance->subject = $subject;
        $instance->comment = $comment;

        return $instance;
    }
}
