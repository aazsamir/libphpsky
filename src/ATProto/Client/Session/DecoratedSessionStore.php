<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Client\Session;

use Aazsamir\Libphpsky\ATProto\Client\AuthConfig;

class DecoratedSessionStore implements SessionStore
{
    public function __construct(
        private SessionStore $decorated,
        private SessionStore $actual,
    ) {}

    public function store(AuthConfig $authConfig, Session $session): void
    {
        $this->decorated->store($authConfig, $session);
        $this->actual->store($authConfig, $session);
    }

    public function retrieve(AuthConfig $authConfig): ?Session
    {
        $retrieved = $this->decorated->retrieve($authConfig);

        if ($retrieved !== null) {
            return $retrieved;
        }

        $actual = $this->actual->retrieve($authConfig);
        
        if ($actual === null) {
            return null;
        }

        $this->decorated->store($authConfig, $actual);

        return $actual;
    }
}
