<?php

use Aazsamir\Libphpsky\Generator\Generator;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;

require __DIR__ . '/vendor/autoload.php';

$config = new MakeConfig([
    new MakeConfigEntry(
        lexiconsPath: __DIR__ . '/lexicons',
        path: __DIR__ . '/src/Model',
        namespace: 'Aazsamir\Libphpsky\Model',
        metaClient: true,
        generate: true,
    ),
]);

$generator = Generator::default();
$generator->generate(
    $config,
);
echo "Generation completed!\n";