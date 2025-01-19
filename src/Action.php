<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky;

use Aazsamir\Libphpsky\Client\ATProtoClientInterface;

interface Action
{
    public function withClient(ATProtoClientInterface $client): self;

    public function withAuth(string $token): self;
}
