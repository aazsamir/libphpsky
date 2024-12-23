<?php

declare(strict_types=1);

use Aazsamir\Libphpsky\Example\Phpsky\Phpsky;

require dirname(__DIR__, 3) . '/vendor/autoload.php';

$phpsky = new Phpsky();
$phpsky->run();
