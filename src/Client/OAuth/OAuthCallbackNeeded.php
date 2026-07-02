<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client\OAuth;

use Aazsamir\Libphpsky\OAuth\Session\OAuthSessionInit;

class OAuthCallbackNeeded extends \Exception
{
    public function __construct(
        string $message,
        protected OAuthSessionInit $sessionInit,
        ?\Throwable $previous = null,
    ) {
        parent::__construct(
            message: $message,
            previous: $previous
        );
    }

    public function getSessionInit(): OAuthSessionInit
    {
        return $this->sessionInit;
    }
}
