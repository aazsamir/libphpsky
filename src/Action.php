<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky;

use Psr\Http\Client\ClientInterface;

interface Action
{
    public function withClient(ClientInterface $client): self;

    public function withAuth(string $token): self;
}
