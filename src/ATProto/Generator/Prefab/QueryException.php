<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Prefab;

class QueryException extends \Exception
{
    public function __construct(string $error, string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct(
            $error . ': ' . $message,
            $code,
            $previous
        );
    }
}
