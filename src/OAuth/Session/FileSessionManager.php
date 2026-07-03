<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth\Session;

readonly class FileSessionManager implements SessionManager
{
    public function __construct(
        private string $dir,
    ) {}

    public function saveSessionInit(OAuthSessionInit $sessionInit): void
    {
        $this->ensureDir();
        $key = $this->initKey($sessionInit->state);
        $file = $this->dir . '/' . $key;
        file_put_contents($file, json_encode($sessionInit));
    }

    public function saveSession(OAuthSession $session): void
    {
        $this->ensureDir();
        $key = $this->sessionKey($session->handle);
        $file = $this->dir . '/' . $key;
        file_put_contents($file, json_encode($session));
    }

    public function getSessionInitByState(string $state): ?OAuthSessionInit
    {
        $this->ensureDir();
        $key = $this->initKey($state);
        $file = $this->dir . '/' . $key;

        if (!file_exists($file)) {
            return null;
        }

        $cached = file_get_contents($file);

        if (!\is_string($cached)) {
            return null;
        }

        $data = json_decode($cached, true);

        if (!\is_array($data)) {
            return null;
        }

        return OAuthSessionInit::fromJson($data);
    }

    public function getSessionByHandle(string $handle): ?OAuthSession
    {
        $this->ensureDir();
        $key = $this->sessionKey($handle);
        $file = $this->dir . '/' . $key;

        if (!file_exists($file)) {
            return null;
        }

        $cached = file_get_contents($file);

        if (!\is_string($cached)) {
            return null;
        }

        $data = json_decode($cached, true);

        if (!\is_array($data)) {
            return null;
        }

        return OAuthSession::fromJson($data);
    }

    public function removeSession(OAuthSession $session): void
    {
        $this->ensureDir();
        $key = $this->sessionKey($session->handle);
        $file = $this->dir . '/' . $key;

        if (file_exists($file)) {
            unlink($file);
        }
    }

    private function initKey(string $state): string
    {
        return md5('init_' . $state);
    }

    private function sessionKey(string $handle): string
    {
        return md5('session_' . $handle);
    }

    private function ensureDir(): void
    {
        if (!is_dir($this->dir)) {
            mkdir($this->dir, recursive: true);
        }
    }
}
