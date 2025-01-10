<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Threadgate;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.feed.threadgate';

    public string $post;

    /** @var mixed[] */
    public ?array $allow = [];
    public string $createdAt;

    /** @var string[] */
    public ?array $hiddenReplies = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param mixed[] $allow
     * @param string[] $hiddenReplies
     */
    public static function new(
        string $post,
        string $createdAt,
        ?array $allow = null,
        ?array $hiddenReplies = null,
    ): self {
        $instance = new self();
        $instance->post = $post;
        $instance->createdAt = $createdAt;
        $instance->allow = $allow;
        $instance->hiddenReplies = $hiddenReplies;

        return $instance;
    }
}
