<?php

declare(strict_types=1);

namespace Tests\Unit\Utils;

use Aazsamir\Libphpsky\Type\ATUri;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class ATUriTest extends TestCase
{
    public function testCreationFromString(): void
    {
        $uri = ATUri::fromString('at://bsky.app/app.bsky.feed.post/3lery4ketx226');

        self::assertEquals('at', $uri->getScheme());
        self::assertEquals('bsky.app', $uri->getHost());
        self::assertEquals('bsky.app', $uri->getDid());
        self::assertEquals('app.bsky.feed.post/3lery4ketx226', $uri->getPath());
        self::assertEquals('app.bsky.feed.post', $uri->getCollection());
        self::assertEquals('3lery4ketx226', $uri->getRecordKey());
        self::assertEmpty($uri->getQuery());
        self::assertEmpty($uri->getFragment());
        self::assertEmpty($uri->getAuthority());
        self::assertEmpty($uri->getUserInfo());
        self::assertNull($uri->getPort());
    }

    public function testWithChaining(): void
    {
        $uri = ATUri::fromString('at://bsky.app/app.bsky.feed.post/3lery4ketx226');

        $newUri = $uri->withScheme('scheme')
            ->withHost('host')
            ->withPath('path')
            ->withQuery('query')
            ->withFragment('fragment')
            ->withPort(8080)
            ->withUserInfo('user', 'password');

        self::assertEquals('scheme://host/path', $newUri->toString());
    }

    public function testNew(): void
    {
        $uri = ATUri::new('did:plc:something', 'app.bsky.feed.post', '3lery4ketx226');

        self::assertEquals('at://did:plc:something/app.bsky.feed.post/3lery4ketx226', (string) $uri);
    }

    public function testOnlyDid(): void
    {
        $uri = ATUri::new('did:plc:something');

        self::assertEquals('at://did:plc:something', $uri->toString());
        self::assertEmpty($uri->getCollection());
        self::assertEmpty($uri->getRecordKey());
    }
}
