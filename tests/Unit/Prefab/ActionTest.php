<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab;

use Tests\Unit\Client\Stub\ClientStub;
use Tests\Unit\Prefab\Fixtures\Action;
use Tests\Unit\Prefab\Fixtures\NullProperty;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class ActionTest extends TestCase
{
    public function testArgs(): void
    {
        $client = new ClientStub();
        $action = new Action();
        $action = $action->withClient($client);

        $action->query('test', 1);
        $request = $client->requests[0];

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('https://bsky.social/xrpc/test.fixtures?string=test&int=1', (string) $request->getUri());
        self::assertEquals('application/json', $request->getHeaderLine('Content-Type'));
        self::assertEmpty($request->getBody()->getContents());
    }

    public function testInput(): void
    {
        $client = new ClientStub();
        $action = new Action();
        $action = $action->withClient($client);
        $input = new NullProperty();
        $input->id = 1;
        $action->query('test', 1, $input);
        $request = $client->requests[0];

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('https://bsky.social/xrpc/test.fixtures?string=test&int=1', (string) $request->getUri());
        self::assertEquals('application/json', $request->getHeaderLine('Content-Type'));
        self::assertEquals('{"id":1}', $request->getBody()->getContents());
    }
}
