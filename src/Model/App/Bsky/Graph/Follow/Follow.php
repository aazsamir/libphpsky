<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Follow;

/**
 * object
 */
class Follow implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.follow';

    public string $subject;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $subject, string $createdAt): self
    {
        $instance = new self();
        $instance->subject = $subject;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
