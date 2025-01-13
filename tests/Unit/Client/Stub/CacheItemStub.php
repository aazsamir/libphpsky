<?php

declare(strict_types=1);

namespace Tests\Unit\Client\Stub;

use Psr\Cache\CacheItemInterface;

class CacheItemStub implements CacheItemInterface
{
    public function __construct(
        public string $key,
        public mixed $value = null,
        public bool $hit = false,
        public ?\DateTimeInterface $expiration = null,
        public ?int $time = null,
    ) {}

    public function getKey(): string
    {
        return $this->key;
    }

    public function get(): mixed
    {
        return $this->value;
    }

    public function isHit(): bool
    {
        return $this->hit;
    }

    public function set(mixed $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function expiresAt(?\DateTimeInterface $expiration): static
    {
        $this->expiration = $expiration;

        return $this;
    }

    public function expiresAfter(int|\DateInterval|null $time): static
    {
        if ($time instanceof \DateInterval) {
            $time = (new \DateTimeImmutable())->add($time)->getTimestamp() - (new \DateTimeImmutable())->getTimestamp();
        }

        $this->time = $time;

        return $this;
    }
}
