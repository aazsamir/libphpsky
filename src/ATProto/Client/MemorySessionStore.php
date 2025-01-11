<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client;

class MemorySessionStore implements SessionStore
{
    private array $sessions = [];

    public function store(AuthConfig $authConfig, Session $session): void
    {
        $this->sessions[$this->key($authConfig)] = $session;
    }

    public function retrieve(AuthConfig $authConfig): ?Session
    {
        return $this->sessions[$this->key($authConfig)] ?? null;
    }

    private function key(AuthConfig $authConfig): string
    {
        return $authConfig->login() . '@' . $authConfig->password();
    }
}