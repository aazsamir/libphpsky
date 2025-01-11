<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Prefab;

class TypeResolver
{
    /**
     * @param string $type in form of `app.bsky.feed.defs#postView`
     */
    public static function resolve(string $type, ?string $key = null): ?string
    {
        if (!str_contains($type, '#')) {
            if ($key === 'record') {
                $type .= '#mainRecord';
            } else {
                $type .= '#main';
            }
        }

        [$namespace, $class] = explode('#', $type);

        if (empty($namespace) || empty($class)) {
            return null;
        }

        $namespace = explode('.', $namespace);
        $namespace = array_map(fn($part) => ucfirst($part), $namespace);
        $namespace = implode('\\', $namespace);
        $class = ucfirst($class);
        $class = '\\Aazsamir\\Libphpsky\\ATProto\\Model\\' . $namespace . '\\' . $class;
        
        if (!class_exists($class)) {
            return null;
        }

        return $class;
    }
}