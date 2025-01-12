<?php

declare(strict_types=1);

require dirname(__DIR__, 3) . '/vendor/autoload.php';

$graph = new Aazsamir\Libphpsky\Example\Bluegraph\GraphGenerate();

if (
    !isset($_SERVER['argv'])
    || !is_array($_SERVER['argv'])
    || !isset($_SERVER['argv'][1])
    || !is_string($_SERVER['argv'][1])
) {
    echo 'Usage: php bluegraph.php <handle>' . \PHP_EOL;

    exit(1);
}

$arg = $_SERVER['argv'][1];
$graph->generate($arg);
