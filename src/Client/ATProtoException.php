<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Client;

class ATProtoException extends \Exception
{
    public function __construct(
        string $error,
        string $message,
        int $code = 0,
        ?\Throwable $previous = null,
        protected ?string $endpoint = null,
        protected ?string $query = null,
    ) {
        parent::__construct(
            $this->formatMessage($error, $message, $endpoint, $query),
            $code,
            $previous
        );
    }

    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    private function formatMessage(
        string $error,
        string $message,
        ?string $endpoint = null,
        ?string $query = null,
    ): string {
        $formattedMessage = $error . ': ' . $message;

        if ($this->code && \is_int($this->code)) {
            $formattedMessage .= '[' . $this->code . ']';
        }

        if ($endpoint !== null || $query !== null) {
            $formattedMessage .= ' (';

            if ($endpoint !== null) {
                $formattedMessage .= 'Endpoint: ' . $endpoint;
            }

            if ($query !== null) {
                $formattedMessage .= ' Query: ' . $query;
            }

            $formattedMessage .= ')';
        }

        return $formattedMessage;
    }
}
