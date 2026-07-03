# OAuth

Libphpsky supports OAuth with atproto. You can use the `ATProtoOAuthClient` to handle the OAuth flow.

> **Note:** Current OAuth implementation is experimental and may change in the future. There might be some rough edges, missing features and bugs.

## Quick Start

By default, you have to provide a handle (e.g. `foo.bsky.social`) to the OAuth client. You can do this by setting the `ATPROTO_OAUTH_HANDLE` environment variable.

In the next step, you have to build the ATProtoClient with OAuth support.

```php
<?php
$builder = ATProtoClientBuilder::default()
    ->useOAuth(true)
    ->oauthClientMetadata(new ClientMetadata());
$client = $builder->build();
```

For quick local testing, you can construct such metadata.

```php
<?php
$redirectUri = 'http://127.0.0.1:8000/oauth/callback';
$scope = 'atproto transition:generic';
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
```

OAuth is used to authenticate requests against your PDS server.
To obtain PDS use `ATProtoFacade`

```php
<?php
$pdsUrl = ATProtoFacade::default()->getPdsUrlByHandle('foo.bsky.social');
```

Now, you can use your client to make requests against the PDS server.
If the session is not established, the client will throw an `OAuthCallbackNeededException`, which you can catch and handle.

After callback is handled, the session will be stored (cached) for future requests.

```php
<?php
try {
    $client = ATProtoClientBuilder::default()
        ->useOAuth(true)
        ->oauthMetadata($metadata)
        ->build();
    $oauthClient = $client->getOAuthClient();
    $pdsUrl = ATProtoFacade::default()
        ->getPdsUrlByHandle('foo.bsky.social');
    $metaClient->appBskyActorGetProfile()
        ->withEndpoint($pdsUrl)
        ->query('foo.bsky.social');
} catch (OAuthCallbackNeededException $e) {
    $redirectUri = $e->getSessionInit()->redirectUrl();
    echo $redirectUri . "\n";
    $input = readline(
        "Go to the above URL and paste the callback URL here:\n"
    );
    parse_str(parse_url($input), $queryParams);
    $session = $oauthClient->handleCallback(
        $query['state'],
        $query['iss'],
        $query['code'],
    );
    echo "OAuth session established and stored.\n";
    echo "You can now use the client to make authenticated requests.\n";
}
```