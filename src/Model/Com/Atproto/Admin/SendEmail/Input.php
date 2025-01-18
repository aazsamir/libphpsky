<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\SendEmail;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.sendEmail';

    public string $recipientDid;
    public string $content;
    public ?string $subject;
    public string $senderDid;
    public ?string $comment;

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
        return ['recipientDid', 'content', 'senderDid'];
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
        if ($subject !== null) {
            $instance->subject = $subject;
        }
        if ($comment !== null) {
            $instance->comment = $comment;
        }

        return $instance;
    }
}
