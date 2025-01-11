<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

class AuthConfig
{
    public function __construct(
        private ?string $login = null,
        private ?string $password = null,
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
