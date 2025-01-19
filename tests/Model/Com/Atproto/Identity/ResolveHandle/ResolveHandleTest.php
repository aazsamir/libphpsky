<?php

declare(strict_types=1);

namespace Tests\Model\Com\Atproto\Identity\ResolveHandle;

use Tests\Model\TestCase;

class ResolveHandleTest extends TestCase
{
    public function testQuery(): void
    {
        $this->mockResponse([
            'did' => 'did:plc:z72i7hdynmk6r22z27h6tvur',
        ]);

        $response = $this->client->comAtprotoIdentityResolveHandle('handle');

        $this->assertEquals('did:plc:z72i7hdynmk6r22z27h6tvur', $response->did);
    }
}