<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Prefab;

/**
 * @internal
 */
trait ToArray
{
    public function toJson(): string
    {
        return json_encode($this->toArray(), \JSON_THROW_ON_ERROR);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $type = $this->determineType();
        $result = [];

        if ($type) {
            $result['$type'] = $type;
        }

        foreach (get_object_vars($this) as $key => $value) {
            $result[$key] = $this->serVar($value);
        }

        return $result;
    }

    private function determineType(): ?string
    {
        // this is a bit of a hack, but it works for now
        // probably will need more thought put into this in the future
        $id = null;
        $name = null;

        if (\defined(static::class . '::ID')) {
            /** @var string */
            $id = \constant(static::class . '::ID');
        }
        if (\defined(static::class . '::NAME')) {
            /** @var string */
            $name = \constant(static::class . '::NAME');
        }

        if ($name === 'main') {
            return $id;
        }

        if ($name === 'output' || $name === 'input') {
            return null;
        }

        return $id . '#' . $name;
    }

    private function serVar(mixed $var): mixed
    {
        if (\is_object($var) && method_exists($var, 'toArray')) {
            return $var->toArray();
        }

        if ($var instanceof \DateTimeInterface) {
            return $var->format(\DateTime::ATOM);
        }

        if (\is_object($var) && method_exists($var, '__toString')) {
            return (string) $var;
        }

        if (\is_array($var)) {
            $result = [];

            foreach ($var as $key => $value) {
                $result[$key] = $this->serVar($value);
            }

            return $result;
        }

        return $var;
    }
}
