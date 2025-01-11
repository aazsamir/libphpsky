<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Example\Phpsky;

use Aazsamir\Libphpsky\ATProto\Client\ProcedureException;
use Aazsamir\Libphpsky\ATProto\Client\QueryException;
use Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\GetProfile\GetProfile;
use Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle;
use Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateSession\CreateSession;
use Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateSession\Input;

class Phpsky
{
    /**
     * @var array{
     *  access: string,
     *  refresh: string,
     *  handle: string
     * }
     */
    private ?array $user = null;

    public function __construct()
    {
        session_start();
        $user = $_SESSION['user'] ?? null;

        if (
            $user !== null
            && \is_array($user)
            && isset($user['access'], $user['refresh'], $user['handle'])

            && \is_string($user['access'])
            && \is_string($user['refresh'])
            && \is_string($user['handle'])
        ) {
            $this->user = $user;
        }
    }

    public function run(): void
    {
        try {
            $this->show();
        } catch (\Throwable $e) {
            echo '<h1>' . $e->getMessage() . '</h1>';
            echo '<pre>';
            var_dump($e);
            echo '</pre>';
        }
    }

    private function show(): void
    {
        if (
            isset($_POST['login'], $_POST['username'], $_POST['password'])

            && \is_string($_POST['username'])
            && \is_string($_POST['password'])
        ) {
            $this->login($_POST['username'], $_POST['password']);
        }

        if (!$this->isAuthenticated()) {
            $this->loginView();
        } else {
            $this->profileView();
        }
    }

    private function login(string $username, string $password): void
    {
        $createSession = CreateSession::default();
        $createSessionInput = Input::new(
            identifier: $username,
            password: $password,
            authFactorToken: 'testing',
            allowTakendown: false,
        );

        try {
            $response = $createSession->procedure($createSessionInput);
        } catch (ProcedureException $e) {
            $this->loginView($e->getMessage());

            return;
        }

        $_SESSION['user'] = [
            'access' => $response->accessJwt,
            'refresh' => $response->refreshJwt,
            'handle' => $response->handle,
        ];

        $this->user = $_SESSION['user'];
    }

    private function isAuthenticated(): bool
    {
        return $this->user !== null;
    }

    private function loginView(?string $message = null): void
    {
        echo <<<'HTML'
            <h1>Login</h1>
            <form method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="login">
            </form>
            HTML;

        if ($message) {
            echo '<p>' . $message . '</p>';
        }
    }

    private function profileView(): void
    {
        if ($this->user === null) {
            $this->loginView();

            return;
        }

        try {
            $resolveHandle = ResolveHandle::default();
            $resolved = $resolveHandle->query($this->user['handle']);

            $getProfile = GetProfile::default();
            $profile = $getProfile->withAuth($this->user['access'])->query($resolved->did);
        } catch (QueryException $e) {
            $_SESSION['user'] = null;

            $this->loginView($e->getMessage());

            return;
        }

        echo <<<HTML
            <h1>Profile</h1>
            did: $profile->did<br>
            handle: $profile->handle<br>
            displayName: $profile->displayName<br>
            description: $profile->description<br>
            avatar: $profile->avatar<br>
            banner: $profile->banner<br>
            followersCount: $profile->followersCount<br>
            followsCount: $profile->followsCount<br>
            postsCount: $profile->postsCount<br>
            indexedAt: $profile->indexedAt<br>
            createdAt: $profile->createdAt<br>
            HTML;
    }
}
