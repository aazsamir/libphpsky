<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed;

/**
 * @internal
 */
class AsyncClientTest extends TestCase
{
    public function testAsyncClientCanMakeRequests(): void
    {
        $futures = [];

        foreach (['bsky.app', 'steampowered.com'] as $actor) {
            $futures[] = \Amp\async(fn (): ProfileViewDetailed => $this->asyncClient->appBskyActorGetProfile()->query($actor));
        }

        [$errors, $profiles] = \Amp\Future\awaitAll($futures);

        self::assertCount(2, $profiles);
        self::assertCount(0, $errors);
        self::assertContainsOnlyInstancesOf(ProfileViewDetailed::class, $profiles);
    }
}
