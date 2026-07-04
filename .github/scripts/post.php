<?php

declare(strict_types=1);

use Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post\Post;
use Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\ByteSlice;
use Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet;
use Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Link;
use Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Tag;
use Aazsamir\Libphpsky\Model\Com\Atproto\Repo\CreateRecord\CreateRecordInput;
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

function getCurrentCommitMessage(): string
{
    $output = [];
    $exitCode = 0;
    exec('git log -1 --pretty=%B 2>/dev/null', $output, $exitCode);

    if ($exitCode !== 0) {
        throw new RuntimeException('Unable to determine current commit message.');
    }

    $message = trim(implode(PHP_EOL, $output));

    if ($message === '') {
        throw new RuntimeException('Commit message is empty.');
    }

    return $message;
}

function formatMessage(string $message): string
{
    $lines = [
        'new commit:',
        $message,
        'https://github.com/aazsamir/libphpsky',
        '#libphpsky',
    ];

    return implode("\n", $lines);
}

/**
 * @return array{0:string, 1:array<Facet>}
 */
function buildPostPayload(string $commitMessage): array
{
    $text = formatMessage($commitMessage);
    $facets = [];

    preg_match_all('~https?://[^\s]+~u', $text, $links, PREG_OFFSET_CAPTURE);
    foreach ($links[0] as [$uri, $start]) {
        $uri = (string) $uri;
        $start = (int) $start;
        $facets[] = Facet::new(
            features: [Link::new($uri)],
            index: ByteSlice::new($start, $start + strlen($uri)),
        );
    }

    preg_match_all('/#[\p{L}\p{N}_]+/u', $text, $hashtags, PREG_OFFSET_CAPTURE);
    foreach ($hashtags[0] as [$rawTag, $start]) {
        $rawTag = (string) $rawTag;
        $start = (int) $start;
        $tag = ltrim($rawTag, '#');
        if ($tag === '') {
            continue;
        }

        $facets[] = Facet::new(
            features: [Tag::new($tag)],
            index: ByteSlice::new($start, $start + strlen($rawTag)),
        );
    }

    return [$text, $facets];
}

$commitMessage = getCurrentCommitMessage();
[$postText, $postFacets] = buildPostPayload($commitMessage);

$client = ATProtoMetaClient::default();
$login = $_ENV['ATPROTO_LOGIN'] ?? getenv('ATPROTO_LOGIN');
$client->comAtprotoRepoCreateRecord()->procedure(
    CreateRecordInput::new(
        repo: $login,
        collection: Post::ID,
        record: Post::new(
            text: $postText,
            createdAt: new DateTimeImmutable(),
            facets: $postFacets,
            langs: [
                'en',
            ],
        ),
    ),
);
