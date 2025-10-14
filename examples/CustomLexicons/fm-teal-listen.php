<?php

declare(strict_types=1);

require dirname(__DIR__, 2) . '/vendor/autoload.php';

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Generator\Generator;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;
use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\Libphpsky\Jetstream\MessageAdapter;
use Aazsamir\Libphpsky\Jetstream\Model\CommitEvent;
use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactory;
use Aazsamir\Libphpsky\Jetstream\WssClient;
use Examples\CustomLexicons\FmTeal\Meta\ATProtoMetaClient;

// By using `default()->with()`, we add a new lexicons, to default atproto|bsky lexicons.
// Thanks to that, if fm.teal.alpha lexicon has any reference to atproto (for example `com.atproto.repo.strongRef`) it will be resolved correctly.
$config = MakeConfig::default()->with(
    new MakeConfigEntry(
        lexiconsPath: __DIR__ . '/lexicons/fm.teal.alpha',
        // note: the path and namespace should be visible by PSR-4 autoloading standard
        path: __DIR__ . '/FmTeal',
        namespace: 'Examples\CustomLexicons\FmTeal',
    ),
);

// this will generate the classes in the specified path
$generator = Generator::default();
$generator->generate($config);

// we create a TypeResolver with our custom config, so it can resolve fm.teal.alpha.* lexicon types
$typeResolver = new TypeResolver($config);

$factory = new WebSocketClientFactory();
$adapter = new MessageAdapter(new TypeResolver($config));
$client = new WssClient($factory, $adapter);

$eventsStream = $client->subscribe(
    wantedCollections: [
        'fm.teal.*',
    ]
);

foreach ($eventsStream as $i => $event) {
    if (!$event instanceof CommitEvent) {
        continue;
    }

    // here we can see that the event is correctly deserialized into our custom class
    dd($event);
}

$client = ATProtoClientBuilder::default()->build();
$client = new ATProtoMetaClient(
    $client,
    $typeResolver,
);

// we can use custom queries/procedures as well, if we know domain of the server
// that can handle fm.teal.alpha lexicon
$client->fmTealAlphaActorGetProfile()->withEndpoint('https://example-fm-server.com')->query('some.actor');
