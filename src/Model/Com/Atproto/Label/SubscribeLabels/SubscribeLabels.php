<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\SubscribeLabels;

/**
 * Subscribe to stream of labels (and negations). Public endpoint implemented by mod services. Uses same sequencing scheme as repo event stream.
 * subscription
 */
class SubscribeLabels implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsSubscription;

    public const NAME = 'main';
    public const ID = 'com.atproto.label.subscribeLabels';

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
