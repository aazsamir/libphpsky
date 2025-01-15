<?php

declare(strict_types=1);

namespace Tests\Unit\Client;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Amp\Http\Client\HttpClient;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class ATProtoClientBuilderTest extends TestCase
{
    protected function tearDown(): void
    {
        unset($_ENV['ATPROTO_LOGIN'], $_ENV['ATPROTO_PASSWORD']);
    }

    public function testDefaultSingleton(): void
    {
        $first = ATProtoClientBuilder::getDefault();
        $second = ATProtoClientBuilder::getDefault();

        self::assertSame($first, $second);
    }

    public function testAuthConfigFromEnv(): void
    {
        $_ENV['ATPROTO_LOGIN'] = 'login';
        $_ENV['ATPROTO_PASSWORD'] = 'password';

        $config = ATProtoClientBuilder::default()->defaultAuthConfig();

        self::assertEquals('login', $config->login());
        self::assertEquals('password', $config->password());
    }

    public function testBuildingDefaultAmphpClient(): void
    {
        $client = ATProtoClientBuilder::default()->defaultAmphpClient();

        self::assertInstanceOf(HttpClient::class, $client);
    }
}
