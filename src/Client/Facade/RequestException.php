<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client\Facade;

use Psr\Http\Message\ResponseInterface;

class RequestException extends FacadeException
{
    public function __construct(
        string $message,
        protected ResponseInterface $response,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, previous: $previous);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
