<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\Account;
use Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\Commit;
use Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\Identity;
use Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\Info;
use Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\SubscribeRepos;
use Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\Sync;

/**
 * @internal
 */
class SubscriptionTest extends TestCase
{
    public function testSubscriptionReceivesMessages(): void
    {
        $subscription = SubscribeRepos::default()
            ->subscription();

        $result = false;
        $message = null;

        foreach ($subscription->next() as $message) {
            $result = $message instanceof Commit
                || $message instanceof Account
                || $message instanceof Identity
                || $message instanceof Info
                || $message instanceof Sync;
            $subscription->stop();
        }

        self::assertTrue(
            $result,
            'Expected to receive at least one message of type Commit, Account, Identity, Info, or Sync. Got `' . get_debug_type($message) . '` instead.'
        );
    }
}
