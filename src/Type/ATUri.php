<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Type;

use Psr\Http\Message\UriInterface;

class ATUri implements ATUriInterface
{
    public function __construct(
        private string $host,
        private string $path,
        private string $scheme = 'at',
    ) {}

    public static function fromString(string $uri): self
    {
        if (str_starts_with($uri, 'at://')) {
            $uri = substr($uri, 5);
        }

        $uri = explode('/', $uri, 2);
        $host = $uri[0];
        $path = $uri[1] ?? '';

        return new self(
            $host,
            $path,
        );
    }

    public function getDid(): string
    {
        return $this->host;
    }

    public function getLexicon(): string
    {
        if (empty($this->path)) {
            return '';
        }

        if (!str_contains($this->path, '.')) {
            return '';
        }

        $lexicon = explode('/', $this->path, 2);

        return $lexicon[0];
    }

    public function getLexiconObjectId(): string
    {
        if (empty($this->path)) {
            return '';
        }

        if (!str_contains($this->path, '.')) {
            return $this->path;
        }

        $lexicon = explode('/', $this->path, 2);

        if (!isset($lexicon[1])) {
            return '';
        }

        return $lexicon[1];
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function getAuthority(): string
    {
        return '';
    }

    public function getUserInfo(): string
    {
        return '';
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): ?int
    {
        return null;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQuery(): string
    {
        return '';
    }

    public function getFragment(): string
    {
        return '';
    }

    public function withScheme(string $scheme): UriInterface
    {
        $self = $this->clone();
        $self->scheme = $scheme;

        return $self;
    }

    public function withUserInfo(string $user, ?string $password = null): UriInterface
    {
        return $this->clone();
    }

    public function withHost(string $host): UriInterface
    {
        $self = $this->clone();
        $self->host = $host;

        return $self;
    }

    public function withPort(?int $port): UriInterface
    {
        return $this->clone();
    }

    public function withPath(string $path): UriInterface
    {
        $self = $this->clone();
        $self->path = $path;

        return $self;
    }

    public function withQuery(string $query): UriInterface
    {
        return $this->clone();
    }

    public function withFragment(string $fragment): UriInterface
    {
        return $this->clone();
    }

    public function __toString(): string
    {
        return "{$this->scheme}://{$this->host}/{$this->path}";
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    public function clone(): static
    {
        return clone $this;
    }
}
