<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

class AuthConfig
{
    public function __construct(
        private readonly ?string $login = null,
        private readonly ?string $password = null,
    ) {}

    public function login(): ?string
    {
        return $this->login;
    }

    public function password(): ?string
    {
        return $this->password;
    }

    public function authFactorToken(): string
    {
        return 'libphpsky';
    }

    public function allowTakendown(): bool
    {
        return true;
    }
}
