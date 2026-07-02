<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\OAuth;

use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
class OAuthInitResult
{
    public function __construct(
        public string $state,
        public string $codeVerifier,
        public ResponseInterface $response,
    ) {}
}
