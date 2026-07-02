<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client\OAuth;

interface HandleProvider
{
    public function provide(): ?string;
}
