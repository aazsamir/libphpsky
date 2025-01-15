<?php

declare(strict_types=1);

namespace Tests\Unit\Client;

use Aazsamir\Libphpsky\Client\AuthAwareClient;
use Aazsamir\Libphpsky\Client\AuthConfig;
use Aazsamir\Libphpsky\Client\Session\MemorySessionStore;
use Aazsamir\Libphpsky\Client\Session\Session;
use Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession;
use Aazsamir\Libphpsky\Model\Com\Atproto\Server\RefreshSession;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\Unit\Client\Stub\ClientStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class AuthAwareClientTest extends TestCase
{
    use CreateRequestTrait;

    private ClientStub $mocked;
    private MemorySessionStore $sessionStore;
    private CreateSession\CreateSession&MockObject $createSession;
    private RefreshSession\RefreshSession&MockObject $refreshSession;
    private AuthConfig $authConfig;

    protected function setUp(): void
    {
        $this->mocked = new ClientStub();
        $this->sessionStore = new MemorySessionStore();
        $this->createSession = $this->createMock(CreateSession\CreateSession::class);
        $this->refreshSession = $this->createMock(RefreshSession\RefreshSession::class);
        $this->refreshSession->method('withAuth')->willReturnSelf();
        $this->authConfig = new AuthConfig(
            login: 'login',
            password: 'password',
        );
    }

    public function testSendRequestWithoutAuth(): void
    {
        $config = new AuthConfig();
        $client = new AuthAwareClient(
            $this->mocked,
            $config,
            $this->sessionStore,
            $this->createSession,
            $this->refreshSession,
        );
        $response = $client->sendRequest($this->createRequest());

        self::assertEquals(200, $response->getStatusCode());
        self::assertEmpty($this->sessionStore->retrieve($this->authConfig));
    }

    public function testSendRequestWithAuth(): void
    {
        $client = new AuthAwareClient(
            $this->mocked,
            $this->authConfig,
            $this->sessionStore,
            $this->createSession,
            $this->refreshSession,
        );

        $this->createSession->expects(self::once())->method('procedure')->willReturn(CreateSession\Output::new(
            accessJwt: 'newaccess',
            refreshJwt: 'newrefresh',
            handle: 'handle',
            did: 'did:plc:123',
        ));
        $this->refreshSession->expects(self::never())->method('procedure');

        $client->sendRequest($this->createRequest());

        self::assertNotEmpty($this->sessionStore->retrieve($this->authConfig));
    }

    public function testSendRequestFromSession(): void
    {
        $client = new AuthAwareClient(
            $this->mocked,
            $this->authConfig,
            $this->sessionStore,
            $this->createSession,
            $this->refreshSession,
        );

        $this->sessionStore->store($this->authConfig, new Session('sesaccess', 'sesrefresh'));

        $this->createSession->expects(self::never())->method('procedure');
        $this->refreshSession->expects(self::never())->method('procedure');

        $client->sendRequest($this->createRequest());
    }

    public function testRefreshSession(): void
    {
        $client = new AuthAwareClient(
            $this->mocked,
            $this->authConfig,
            $this->sessionStore,
            $this->createSession,
            $this->refreshSession,
        );

        $this->sessionStore->store($this->authConfig, new Session('sesaccess', 'sesrefresh'));

        $this->createSession->expects(self::never())->method('procedure');
        $this->refreshSession->expects(self::once())->method('procedure')->willReturn(RefreshSession\Output::new(
            accessJwt: 'refreshedaccess',
            refreshJwt: 'refreshedrefresh',
            handle: 'handle',
            did: 'did:plc:123',
        ));

        $this->mocked->responses = [new Response(
            status: 401,
        )];

        $client->sendRequest($this->createRequest());

        self::assertEquals(
            'refreshedaccess',
            $this->sessionStore->retrieve($this->authConfig)->getAccessToken(),
        );
        self::assertEquals(
            'refreshedrefresh',
            $this->sessionStore->retrieve($this->authConfig)->getRefreshToken(),
        );
    }
}
