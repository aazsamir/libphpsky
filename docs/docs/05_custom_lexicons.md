# Custom Lexicons

Libphpsky supports generating types for custom lexicons. You can use any lexicon that follows the [AT Protocol Lexicon Specification](https://atproto.com/specs/lexicon).
Custom lexicons may even reference other lexicons, including the native atproto lexicons.

## Generating Types
```php
<?php
// file: generate-fm-teal.php

require __DIR__ . '/vendor/autoload.php';

$config = MakeConfig::default()->with(
    new MakeConfigEntry(
        lexiconsPath: __DIR__ . '/lexicons/fm.teal.alpha',
        // path and namespace must follow PSR-4
        path: __DIR__ . 'src/FmTeal',
        namespace: 'App\FmTeal',
    ),
);

// this will generate the classes in the specified path
$generator = Generator::default();
$generator->generate($config);
```

And run script with
`php generate-fm-teal.php`

## Usage

After successful generation, you can use the generated client in your code.
You need to create a `TypeResolver` with the same configuration as used during generation.

```php
<?php

use App\FmTeal\Meta\ATProtoMetaClient;

$config = MakeConfig::default()->with(
    new MakeConfigEntry(
        lexiconsPath: __DIR__ . '/lexicons/fm.teal.alpha',
        path: __DIR__ . '/FmTeal',
        namespace: 'Examples\CustomLexicons\FmTeal',
    ),
);

$typeResolver = new TypeResolver($config);

$client = new ATProtoMetaClient(
    typeResolver: $typeResolver,
);

$client
    ->fmTealAlphaActorGetProfile()
    ->withEndpoint('https://example-fm-server.com')
    ->query('some.actor');
```

These lexicons can also be used with subscriptions, you just need to pass the same `TypeResolver` to the `MessageAdapter`.

```php
<?php

$client = WssClient::default(
    messageAdapter: new MessageAdapter($typeResolver),
);

$eventsStream = $client->subscribe(
    wantedCollections: [
        'fm.teal.*',
    ]
);

foreach ($eventsStream as $i => $event) {
    if (!$event instanceof CommitEvent) {
        continue;
    }

    // record is correctly typed as \App\FmTeal\SomeRecord
    var_dump($event->commit->record);
}
```

You can find the working example in the [examples/CustomLexicons](https://github.com/aazsamir/libphpsky/tree/main/examples/CustomLexicons) directory.