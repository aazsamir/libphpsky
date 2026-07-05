<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * Repository event stream, aka Firehose endpoint. Outputs repo commits with diff data, and identity update events, for all repositories on the current server. See the atproto specifications for details around stream sequencing, repo versioning, CAR diff format, and more. Public and does not require auth; implemented by PDS and Relay.
 * subscription
 */
class SubscribeRepos implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsSubscription;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?int $cursor The last known event seq number to backfill from.
     */
    public function subscription(?int $cursor = null): \Aazsamir\Libphpsky\Subscription\Subscription
    {
        return $this->createSubscription($this->argsWithKeys(func_get_args()));
    }
}
