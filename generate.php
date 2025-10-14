<?php

use Aazsamir\Libphpsky\Generator\Generator;
use Aazsamir\Libphpsky\Generator\Loader\FileLexiconProvider;
use Aazsamir\Libphpsky\Generator\Loader\Loader;
use Aazsamir\Libphpsky\Generator\Maker\ClassResolver;
use Aazsamir\Libphpsky\Generator\Maker\FileSaveClass;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;
use Aazsamir\Libphpsky\Generator\Maker\Maker;
use Aazsamir\Libphpsky\Generator\Maker\MetaClientGenerator;
use Aazsamir\Libphpsky\Generator\Maker\ObjectDefHandler;
use Aazsamir\Libphpsky\Generator\Maker\ProcedureDefHandler;
use Aazsamir\Libphpsky\Generator\Maker\QueryDefHandler;
use Aazsamir\Libphpsky\Generator\RefResolver;

require __DIR__ . '/vendor/autoload.php';

$saver = new FileSaveClass();
$classResolver = new ClassResolver();
$queryDefHandler = new QueryDefHandler(
    $classResolver,
    $saver,
);
$procedureDefHandler = new ProcedureDefHandler(
    $classResolver,
    $saver,
);
$objectDefHandler = new ObjectDefHandler(
    $classResolver,
    $saver,
);
$metaClientGenerator = new MetaClientGenerator(
    $saver,
    $classResolver,
);
$maker = new Maker(
    $classResolver,
    $queryDefHandler,
    $objectDefHandler,
    $procedureDefHandler,
    $metaClientGenerator,
);

$refResolver = new RefResolver();

$config = new MakeConfig([
    new MakeConfigEntry(
        lexiconsPath: __DIR__ . '/lexicons',
        path: __DIR__ . '/src/Model',
        namespace: 'Aazsamir\Libphpsky\Model',
        metaClient: true,
        generate: true,
    ),
]);

$loader = new Loader(
    lexiconProvider: new FileLexiconProvider(),
);

$generator = new Generator(
    $loader,
    $maker,
    $refResolver,
);
$generator->generate(
    $config,
);