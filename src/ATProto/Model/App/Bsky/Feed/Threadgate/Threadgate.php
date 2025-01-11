<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Threadgate;

/**
 * object
 */
class Threadgate implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.threadgate';

    public string $post;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Threadgate\ListRule>|null */
    public ?array $allow = [];
    public string $createdAt;

    /** @var array<string>|null */
    public ?array $hiddenReplies = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Threadgate\ListRule> $allow
     * @param array<string> $hiddenReplies
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
