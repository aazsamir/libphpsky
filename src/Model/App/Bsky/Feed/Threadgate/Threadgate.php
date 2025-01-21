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

    /** @var string Reference (AT-URI) to the post record. */
    public string $post;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\ListRule> */
    public ?array $allow = [];
    public \DateTimeInterface $createdAt;

    /** @var ?array<string> List of hidden reply URIs. */
    public ?array $hiddenReplies = [];

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
        return ['post', 'createdAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\MentionRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\FollowingRule|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Threadgate\ListRule> $allow
     * @param array<string> $hiddenReplies
     */
    public static function new(
        string $post,
        \DateTimeInterface $createdAt,
        ?array $allow = [],
        ?array $hiddenReplies = [],
    ): self {
        $instance = new self();
        $instance->post = $post;
        $instance->createdAt = $createdAt;
        if ($allow !== null) {
            $instance->allow = $allow;
        }
        if ($hiddenReplies !== null) {
            $instance->hiddenReplies = $hiddenReplies;
        }

        return $instance;
    }
}
