<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate;

/**
 * object
 */
class Threadgate implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.threadgate';

    public string $post;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\ListRule>|null */
    public ?array $allow = [];
    public \DateTimeInterface $createdAt;

    /** @var array<string>|null */
    public ?array $hiddenReplies = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\ListRule> $allow
     * @param array<string> $hiddenReplies
     */
    public static function new(
        string $post,
        \DateTimeInterface $createdAt,
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
