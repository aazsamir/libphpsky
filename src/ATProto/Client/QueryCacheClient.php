<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

use GuzzleHttp\Psr7\Response;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class QueryCacheClient implements ATProtoClientInterface
{
    public function __construct(
        private ATProtoClientInterface $decorated,
        private CacheItemPoolInterface $cache,
        private int $ttl = 600,
        private string $prefix = 'atproto_query_cache_',
    ) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        if ($request->getMethod() !== 'GET') {
            return $this->decorated->sendRequest($request);
        }

        $key = $this->key($request);
        $item = $this->cache->getItem($key);

        if ($item->isHit()) {
            return $this->unserializeResponse($item->get());
        }

        $response = $this->decorated->sendRequest($request);
        $item->set(
            $this->serializeResponse($response),
        );
        $item->expiresAfter($this->ttl);
        $this->cache->save($item);

        return $response;
    }

    private function serializeResponse(ResponseInterface $response): string
    {
        return \serialize([
            'status' => $response->getStatusCode(),
            'headers' => $response->getHeaders(),
            'body' => (string) $response->getBody(),
            'reason' => $response->getReasonPhrase(),
        ]);
    }

    private function unserializeResponse(string $string): ResponseInterface
    {
        $data = \unserialize($string);

        return new Response(
            status: $data['status'],
            headers: $data['headers'],
            body: $data['body'],
            reason: $data['reason'],
        );
    }

    private function key(RequestInterface $request): string
    {
        $uri = (string) $request->getUri()->getPath();
        $uri = \strtolower($uri);
        $auth = $request->getHeader('Authorization');
        $auth = implode('', $auth);
        $uri .= $auth;

        return $this->prefix . \md5($uri);
    }
}
