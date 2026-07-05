<?php

declare(strict_types=1);

namespace Tests\Unit\Client;

use Aazsamir\Libphpsky\Client\OAuth\EnvHandleProvider;
use Aazsamir\Libphpsky\Client\OAuth\OAuthCallbackNeeded;
use Aazsamir\Libphpsky\Client\OAuthAwareClient;
use GuzzleHttp\Psr7\Request;
use Tests\Stub\ATProtoClientStub;
use Tests\Stub\ATProtoOAuthClientStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
class OAuthAwareClientTest extends TestCase
{
    private ATProtoClientStub $atprotoClient;
    private ATProtoOAuthClientStub $oauthClient;
    private OAuthAwareClient $oAuthAwareClient;

    protected function setUp(): void
    {
        $_ENV['ATPROTO_OAUTH_HANDLE'] = 'test.bsky.social';
        $this->atprotoClient = new ATProtoClientStub();
        $this->oauthClient = new ATProtoOAuthClientStub();
        $this->oAuthAwareClient = new OAuthAwareClient($this->atprotoClient, $this->oauthClient, new EnvHandleProvider());
    }

    public function testNoSessionThrowsCallbackNeeded(): void
    {
        $request = new Request('GET', 'https://example.com');
        $this->expectException(OAuthCallbackNeeded::class);
        $this->oAuthAwareClient->sendRequest($request);
    }
}
