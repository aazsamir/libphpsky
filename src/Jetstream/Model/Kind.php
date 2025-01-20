<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream\Model;

enum Kind: string
{
    case COMMIT = 'commit';
    case IDENTITY = 'identity';
    case ACCOUNT = 'account';
}