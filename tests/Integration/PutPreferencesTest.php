<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\FilterablePreference;
use Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutPreferencesV2;

class PutPreferencesTest extends TestCase
{
    public function testItUpdatesPreferences(): void
    {
        $output = $this->client->appBskyNotificationPutPreferencesV2()->procedure(
            PutPreferencesV2\Input::new(
                like: FilterablePreference::new(
                    include: 'all',
                    list: true,
                    push: true,
                ),
            ),
        );

        $this->assertEquals('all', $output->preferences->like->include);
        $this->assertTrue($output->preferences->like->list);
        $this->assertTrue($output->preferences->like->push);
    }
}
