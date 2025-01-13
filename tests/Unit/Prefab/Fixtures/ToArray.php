<?php

declare(strict_types=1);

namespace Tests\Unit\Prefab\Fixtures;

trait ToArray
{
    public function toArray(): array
    {
        $data = get_object_vars($this);

        foreach ($data as $key => $value) {
            if (\is_object($value) && method_exists($value, 'toArray')) {
                $data[$key] = $value->toArray();
            }

            if (\is_array($value)) {
                foreach ($value as $k => $v) {
                    if (\is_object($v) && method_exists($v, 'toArray')) {
                        $data[$key][$k] = $v->toArray();
                    }
                }
            }
        }

        return $data;
    }
}
