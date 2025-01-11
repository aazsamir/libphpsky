<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

class NoopSessionStore implements SessionStore
{
    public function store(AuthConfig $authConfig, Session $session): void
    {
    }

    public function retrieve(AuthConfig $authConfig): ?Session
    {
        return null;
    }
}