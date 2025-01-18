<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class FeedViewPost implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'feedViewPost';
    public const ID = 'app.bsky.feed.defs';

    public ?PostView $post;
    public ?ReplyRef $reply;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ReasonRepost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ReasonPin|null */
    public mixed $reason;
    public ?string $feedContext;

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
        return ['post'];
    }

    public static function new(
        ?PostView $post = null,
        ?ReplyRef $reply = null,
        ReasonRepost|ReasonPin|null $reason = null,
        ?string $feedContext = null,
    ): self {
        $instance = new self();
        if ($post !== null) {
            $instance->post = $post;
        }
        if ($reply !== null) {
            $instance->reply = $reply;
        }
        if ($reason !== null) {
            $instance->reason = $reason;
        }
        if ($feedContext !== null) {
            $instance->feedContext = $feedContext;
        }

        return $instance;
    }
}
