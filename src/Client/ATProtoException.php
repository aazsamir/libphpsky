<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

use Psr\Http\Message\ResponseInterface;

class ATProtoException extends \Exception
{
    public function __construct(
        string $error,
        string $message,
        int $code = 0,
        ?\Throwable $previous = null,
        protected ?ResponseInterface $response = null,
        protected ?string $host = null,
        protected ?string $endpoint = null,
        protected ?string $query = null,
    ) {
        parent::__construct(
            $this->formatMessage($error, $message, $host, $endpoint, $query),
            $code,
            $previous
        );
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }

    private function formatMessage(
        string $error,
        string $message,
        ?string $host = null,
        ?string $endpoint = null,
        ?string $query = null,
    ): string {
        $formattedMessage = $error . ': ' . $message;

        if ($this->code && \is_int($this->code)) {
            $formattedMessage .= '[' . $this->code . ']';
        }

        if ($host !== null || $endpoint !== null || $query !== null) {
            $formattedMessage .= ' (';
            $parts = [];

            if ($host !== null) {
                $parts[] = 'Host: ' . $host;
            }

            if ($endpoint !== null) {
                $parts[] = 'Endpoint: ' . $endpoint;
            }

            if ($query !== null) {
                $parts[] = 'Query: ' . $query;
            }

            $formattedMessage .= implode(', ', $parts);
            $formattedMessage .= ')';
        }

        return $formattedMessage;
    }
}
