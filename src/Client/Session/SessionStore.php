<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client\Session;

use Aazsamir\Libphpsky\Client\AuthConfig;

interface SessionStore
{
    public function store(AuthConfig $authConfig, Session $session): void;

    public function retrieve(AuthConfig $authConfig): ?Session;
}
