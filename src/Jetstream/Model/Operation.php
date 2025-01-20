<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream\Model;

enum Operation: string
{
    case CREATE = 'create';
    case UPDATE = 'update';
    case DELETE = 'delete';
}