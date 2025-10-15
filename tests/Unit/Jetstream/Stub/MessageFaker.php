<?php

declare(strict_types=1);

namespace Tests\Unit\Jetstream\Stub;

use WebSocket\Message\Ping;
use WebSocket\Message\Text;

class MessageFaker
{
    public static function commit(): Text
    {
        return self::text([
            'kind' => 'commit',
            'time_us' => 1678888888,
            'did' => 'did:plc:123456789abcdefghi',
            'commit' => [
                'operation' => 'create',
                'collection' => 'app.bsky.feed.post',
                'rkey' => '3q2w4e5r6t7y8u9i0o',
                'rev' => '1-abcdef1234567890',
            ],
            'record' => null,
        ]);
    }

    public static function ping(): Ping
    {
        return new Ping();
    }

    private static function text(array $data): Text
    {
        return new Text(json_encode($data));
    }
}
