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

    public static function new(string $did, ?string $collection = null, ?string $recordKey = null): self
    {
        $path = $collection === null ? '' : "{$collection}/{$recordKey}";

        return new self(
            $did,
            $path,
        );
    }

    public function getDid(): string
    {
        return $this->host;
    }

    public function getCollection(): string
    {
        if (empty($this->path)) {
            return '';
        }

        if (!str_contains($this->path, '.')) {
            return '';
        }

        $collection = explode('/', $this->path, 2);

        return $collection[0];
    }

    public function getRecordKey(): string
    {
        if (empty($this->path)) {
            return '';
        }

        if (!str_contains($this->path, '.')) {
            return $this->path;
        }

        $rkey = explode('/', $this->path, 2);

        if (!isset($rkey[1])) {
            return '';
        }

        return $rkey[1];
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
        if (empty($this->path)) {
            return "{$this->scheme}://{$this->host}";
        }

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
