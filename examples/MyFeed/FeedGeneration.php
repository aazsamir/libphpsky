<?php

declare(strict_types=1);

namespace Examples\MyFeed;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\AuthConfig;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\SkeletonFeedPost;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\DescribeFeedGenerator;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Generator\Generator;
use Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedSkeleton;
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;
use Aazsamir\Libphpsky\Type\ATUri;

class FeedGeneration
{
    private ATProtoMetaClient $metaClient;
    private AuthConfig $authConfig;
    private string $hostname;

    public function __construct()
    {
        $this->authConfig = (new ATProtoClientBuilder())->defaultAuthConfig();
        $this->metaClient = new ATProtoMetaClient();

        if (!isset($_ENV['FEED_HOSTNAME']) || !\is_string($_ENV['FEED_HOSTNAME'])) {
            throw new \RuntimeException('FEED_HOSTNAME is required');
        }

        $this->hostname = $_ENV['FEED_HOSTNAME'];
    }

    public function run(): void
    {
        $path = \is_string($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        $path = parse_url($path, \PHP_URL_PATH);

        match ($path) {
            '/xrpc/app.bsky.feed.getFeedSkeleton' => $this->getFeedSkeleton(),
            '/xrpc/app.bsky.feed.generator' => $this->getFeedGenerator(),
            '/.well-known/did.json' => $this->getWellKnown(),
            default => $this->notFound(),
        };
    }

    private function getFeedSkeleton(): void
    {
        $feed = $_GET['feed'] ?? null;

        if ($feed === null || !\is_string($feed)) {
            throw new \RuntimeException('Feed is required');
        }

        $feed = ATUri::fromString($feed);
        $algorithm = $feed->getRecordKey();

        match ($algorithm) {
            'libphpsky-feed' => $this->getLibphpskyFeed(),
            default => $this->notFound(),
        };
    }

    private function getFeedGenerator(): void
    {
        if ($this->authConfig->login() === null) {
            throw new \RuntimeException('ATPROTO_LOGIN is required');
        }

        $myself = $this->metaClient->comAtprotoIdentityResolveHandle($this->authConfig->login());

        $generator = DescribeFeedGenerator\Output::new(
            did: ATUri::new(
                did: 'did:web:' . $this->hostname,
            )->toString(),
            feeds: [
                DescribeFeedGenerator\Feed::new(
                    uri: ATUri::new(
                        did: $myself->did,
                        collection: Generator::ID,
                        recordKey: 'libphpsky-feed',
                    )->toString(),
                ),
            ],
        );

        header('Content-Type: application/json');
        echo json_encode($generator->toArray());
    }

    private function getLibphpskyFeed(): void
    {
        $feed = GetFeedSkeleton\Output::new(
            cursor: '1',
            feed: [
                SkeletonFeedPost::new(
                    post: ATUri::new(
                        did: 'did:plc:rbkeag6b36ghkibhr6x235pm',
                        collection: 'app.bsky.feed.post',
                        recordKey: '3lfsth7mlks23',
                    )->toString(),
                ),
            ],
        );

        header('Content-Type: application/json');
        echo json_encode($feed->toArray());
    }

    private function getWellKnown(): void
    {
        $wellKnown = [
            '@context' => ['https://www.w3.org/ns/did/v1'],
            'id' => 'did:web:' . $this->hostname,
            'service' => [
                [
                    'id' => '#bsky_fg',
                    'type' => 'BskyFeedGenerator',
                    'serviceEndpoint' => 'https://' . $this->hostname,
                ],
            ],
        ];

        header('Content-Type: application/json');
        echo json_encode($wellKnown);
    }

    private function notFound(): void
    {
        header('HTTP/1.1 404 Not Found');
        echo '<h1>404 Not Found</h1>';
    }
}
