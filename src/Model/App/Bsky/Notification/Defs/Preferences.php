<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs;

/**
 * object
 */
class Preferences implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'preferences';
    public const ID = 'app.bsky.notification.defs';

    public ?ChatPreference $chat;
    public ?FilterablePreference $follow;
    public ?FilterablePreference $like;
    public ?FilterablePreference $likeViaRepost;
    public ?FilterablePreference $mention;
    public ?FilterablePreference $quote;
    public ?FilterablePreference $reply;
    public ?FilterablePreference $repost;
    public ?FilterablePreference $repostViaRepost;
    public ?Preference $starterpackJoined;
    public ?Preference $subscribedPost;
    public ?Preference $unverified;
    public ?Preference $verified;

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
        return ['chat', 'follow', 'like', 'likeViaRepost', 'mention', 'quote', 'reply', 'repost', 'repostViaRepost', 'starterpackJoined', 'subscribedPost', 'unverified', 'verified'];
    }

    public static function new(
        ?ChatPreference $chat = null,
        ?FilterablePreference $follow = null,
        ?FilterablePreference $like = null,
        ?FilterablePreference $likeViaRepost = null,
        ?FilterablePreference $mention = null,
        ?FilterablePreference $quote = null,
        ?FilterablePreference $reply = null,
        ?FilterablePreference $repost = null,
        ?FilterablePreference $repostViaRepost = null,
        ?Preference $starterpackJoined = null,
        ?Preference $subscribedPost = null,
        ?Preference $unverified = null,
        ?Preference $verified = null,
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
