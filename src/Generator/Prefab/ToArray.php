<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Prefab;

trait ToArray
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $result = [];

        foreach (get_object_vars($this) as $key => $value) {
            $result[$key] = $this->serVar($value);
        }

        return $result;
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
