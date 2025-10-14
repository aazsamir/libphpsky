<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Jetstream\WssClient;
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

abstract class TestCase extends FrameworkTestCase
{
    protected ATProtoMetaClient $client;
    protected ATProtoMetaClient $asyncClient;
    protected WssClient $wssClient;

    protected function setUp(): void
    {
        $_ENV['ATPROTO_LOGIN'] ??= getenv('ATPROTO_LOGIN');
        $_ENV['ATPROTO_PASSWORD'] ??= getenv('ATPROTO_PASSWORD');

        $client = ATProtoClientBuilder::default()->useQueryCache(false)->build();
        $this->client = new ATProtoMetaClient($client);

        $client = ATProtoClientBuilder::default()->useQueryCache(false)->useAsync(true)->build();
        $this->asyncClient = new ATProtoMetaClient($client);

        $this->wssClient = WssClient::default();
    }
}
