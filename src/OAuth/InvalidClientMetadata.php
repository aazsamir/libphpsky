<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

class InvalidClientMetadata extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
