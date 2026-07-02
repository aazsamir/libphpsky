<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth\Session;

interface SessionManager
{
    public function saveSessionInit(OAuthSessionInit $sessionInit): void;

    public function saveSession(OAuthSession $session): void;

    public function getSessionInitByState(string $state): ?OAuthSessionInit;

    public function getSessionByHandle(string $handle): ?OAuthSession;

    public function removeSession(OAuthSession $session): void;
}
