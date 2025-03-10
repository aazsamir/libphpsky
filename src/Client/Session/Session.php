<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client\Session;

class Session
{
    public function __construct(
        private string $accessToken,
        private string $refreshToken,
    ) {}

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }
}
