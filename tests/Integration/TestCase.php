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
        if (isset($_ENV['ATPROTO_LOGIN']) && strlen($_ENV['ATPROTO_LOGIN']) > 3) {
            print('ATPROTO_LOGIN is set; ');
        } else {
            print('ATPROTO_LOGIN is NOT set; ');
        }
        if (isset($_ENV['ATPROTO_PASSWORD']) && strlen($_ENV['ATPROTO_PASSWORD']) > 3) {
            print('ATPROTO_PASSWORD is set; ');
        } else {
            print('ATPROTO_PASSWORD is NOT set; ');
        }
        $client = ATProtoClientBuilder::default()->useQueryCache(false)->build();
        $this->client = new ATProtoMetaClient($client);

        $this->wssClient = WssClient::default();
    }
}
