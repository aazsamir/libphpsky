<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Listitem;

/**
 * object
 */
class Listitem implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.listitem';

    public string $subject;
    public string $list;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $subject, string $list, string $createdAt): self
    {
        $instance = new self();
        $instance->subject = $subject;
        $instance->list = $list;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
