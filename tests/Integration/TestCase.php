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
    protected WssClient $wssClient;

    protected function setUp(): void
    {
        $client = ATProtoClientBuilder::default()->useQueryCache(false)->build();
        $this->client = new ATProtoMetaClient($client);

        $this->wssClient = WssClient::default();
    }
}
