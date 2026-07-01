<?php

declare(strict_types=1);

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

// build client
$client = new ATProtoMetaClient(
    ATProtoClientBuilder::default()
        ->useQueryCache(false) // disable query cache to always get fresh data
        ->build()
);
// grab auth config from ENV
$auth = ATProtoClientBuilder::default()->defaultAuthConfig();

if (!$auth->login()) {
    throw new \RuntimeException('Please set the ATPROTO_LOGIN environment variable.');
}

// request account DID
$did = $client->comAtprotoIdentityResolveHandle()->query($auth->login());
// request repo record
$repo = $client->comAtprotoRepoDescribeRepo()->query($did->did);
// grab service endpoint from repo
// chat service endpoint must be requested against account service endpoint, not generic https://bsky.social
/** @var string */
$serviceEndpoint = $repo->didDoc['service'][0]['serviceEndpoint'] ?? throw new \RuntimeException('Service endpoint not found in DID document.'); // @phpstan-ignore-line
$unread = $client
    ->chatBskyConvoGetUnreadCounts()
    ->withEndpoint($serviceEndpoint)
    ->withHeaderAtprotoProxyChat() // add required atproto-proxy header
    ->query();

dd($unread);
