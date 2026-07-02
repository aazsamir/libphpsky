<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

enum ApplicationType: string
{
    case WEB = 'web';
    case NATIVE = 'native';
}
