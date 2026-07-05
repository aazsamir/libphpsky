<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\SubscribeModEvents;

/**
 * Subscribe to stream of chat events targeted to moderation. Private endpoint.
 * subscription
 */
class SubscribeModEvents implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsSubscription;

    public const NAME = 'main';
    public const ID = 'chat.bsky.moderation.subscribeModEvents';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $cursor The last known event seq number to backfill from. Use '2222222222222' to backfill from the beginning. Don't specify a cursor to listen only for new events.
     */
    public function subscription(?string $cursor = null): \Aazsamir\Libphpsky\Subscription\Subscription
    {
        return $this->createSubscription($this->argsWithKeys(func_get_args()));
    }
}
