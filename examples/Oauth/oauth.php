<?php

declare(strict_types=1);

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\Facade\ATProtoFacade;
use Aazsamir\Libphpsky\Client\OAuth\OAuthCallbackNeeded;
use Aazsamir\Libphpsky\Client\OAuthAwareClient;
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;
use Aazsamir\Libphpsky\OAuth\ClientMetadata;
use Aazsamir\Libphpsky\OAuth\Session\FileSessionManager;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

$redirectUri = 'http://127.0.0.1:8000/oauth/callback';
$scope = 'atproto transition:generic';

// normally you would expose these metadata as a well-known endpoint
$metadata = new ClientMetadata(
    clientId: 'http://localhost?' . http_build_query([
        'redirect_uri' => $redirectUri,
        'scope' => $scope,
    ]),
    clientName: 'Libphpsky Oauth Example',
    redirectUris: [$redirectUri],
    tokenEndpointAuthMethod: 'none',
    scope: $scope,
);

// build the client with OAuth support
$builder = ATProtoClientBuilder::default()
    ->useOAuth(true)
    ->useQueryCache(false)
    ->oauthMetadata($metadata)
    ->oauthSessionManager(new FileSessionManager(__DIR__ . '/sessions'));

// grab user handle from ENV
$handle = $builder->defaultOAuthHandleProvider()->provide();

if ($handle === null) {
    echo 'No handle provided. Please set ATPROTO_OAUTH_HANDLE environment variable with your handle (e.g. "foo.bsky.social").' . \PHP_EOL;
    exit(1);
}

$client = $builder->build();
assert($client instanceof OAuthAwareClient);
// grab the underlying OAuth client to handle the callback
$oauthClient = $client->getOAuthClient();
$metaClient = new ATProtoMetaClient($client);
$facade = ATProtoFacade::default($client);

try {
    $pdsUrl = $facade->getPdsByHandle($handle);
    $profile = $metaClient
        ->appBskyActorGetProfile()
        ->withEndpoint($pdsUrl)
        ->query($handle); // on first run, this will throw an OAuthCallbackNeeded exception, which we will catch below
    dd($profile);
} catch (OAuthCallbackNeeded $e) {
    // normally you would redirect the user to the $e->getSessionInit()->redirectUrl() URL, and then handle the callback in a separate endpoint.
    // for this example, we will just print the URL and ask the user to paste the callback URL back into the console.
    $redirectUri = $e->getSessionInit()->redirectUrl();
    echo "OAuth callback needed. Please visit the following URL to authorize the application:\n";
    echo $redirectUri . "\n";
    $input = (string) readline("After authorizing, you will be redirected to the callback URL. Please paste this URL here:\n");
    $parsedUrl = parse_url($input);
    parse_str($parsedUrl['query'] ?? '', $queryParams);

    [
        'state' => $state,
        'iss' => $iss,
        'code' => $code,
    ] = $queryParams;

    if (!is_string($state) || !is_string($iss) || !is_string($code)) {
        throw new RuntimeException('Invalid callback URL. Missing required query parameters.');
    }

    // handle the callback using the OAuth client, which will store (cache) the session for future requests
    $session = $oauthClient->handleCallback($state, $iss, $code);
    echo "OAuth session established and stored. You can now use the client to make authenticated requests.\n";
    // now, you can retry running this script and it should work without needing to authorize again
}
