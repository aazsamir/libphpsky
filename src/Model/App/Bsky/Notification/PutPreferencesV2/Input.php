<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutPreferencesV2;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.notification.putPreferencesV2';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\ChatPreference $chat;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $follow;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $like;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $likeViaRepost;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $mention;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $quote;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $reply;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $repost;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $repostViaRepost;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preference $starterpackJoined;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preference $subscribedPost;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preference $unverified;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preference $verified;

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
        return [];
    }

    public static function new(
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\ChatPreference $chat = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $follow = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $like = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $likeViaRepost = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $mention = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $quote = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $reply = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $repost = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference $repostViaRepost = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preference $starterpackJoined = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preference $subscribedPost = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preference $unverified = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preference $verified = null,
    ): self {
        $instance = new self();
        if ($chat !== null) {
            $instance->chat = $chat;
        }
        if ($follow !== null) {
            $instance->follow = $follow;
        }
        if ($like !== null) {
            $instance->like = $like;
        }
        if ($likeViaRepost !== null) {
            $instance->likeViaRepost = $likeViaRepost;
        }
        if ($mention !== null) {
            $instance->mention = $mention;
        }
        if ($quote !== null) {
            $instance->quote = $quote;
        }
        if ($reply !== null) {
            $instance->reply = $reply;
        }
        if ($repost !== null) {
            $instance->repost = $repost;
        }
        if ($repostViaRepost !== null) {
            $instance->repostViaRepost = $repostViaRepost;
        }
        if ($starterpackJoined !== null) {
            $instance->starterpackJoined = $starterpackJoined;
        }
        if ($subscribedPost !== null) {
            $instance->subscribedPost = $subscribedPost;
        }
        if ($unverified !== null) {
            $instance->unverified = $unverified;
        }
        if ($verified !== null) {
            $instance->verified = $verified;
        }

        return $instance;
    }
}
