<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client\OAuth;

readonly class EnvHandleProvider implements HandleProvider
{
    public function provide(): ?string
    {
        return $_ENV['ATPROTO_OAUTH_HANDLE'] ?? null; // @phpstan-ignore-line
    }
}
