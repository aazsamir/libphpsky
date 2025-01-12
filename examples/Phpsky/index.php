<?php

declare(strict_types=1);

use Examples\Phpsky\Phpsky;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

$phpsky = new Phpsky();
$phpsky->run();
