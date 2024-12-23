<?php

use Aazsamir\Libphpsky\ATProto\Generator\Generator;

require __DIR__ . '/vendor/autoload.php';

$client = new Generator();
$client->generate();