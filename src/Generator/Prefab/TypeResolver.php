<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Prefab;

use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;

/**
 * @internal
 */
final class TypeResolver
{
    public function __construct(private MakeConfig $config) {}

    public static function default(): self
    {
        return new self(MakeConfig::default());
    }

    /**
     * @param string $type in form of `app.bsky.feed.defs#postView`
     *
     * @phpstan-return class-string|null
     */
    public function resolve(string $type): ?string
    {
        if (!str_contains($type, '#')) {
            $class = explode('.', $type);
            $class = array_pop($class);
            $type = $type . '#' . $class;
        }

        [$namespace, $class] = explode('#', $type);

        if (empty($namespace) || empty($class)) {
            return null;
        }

        $namespace = explode('.', $namespace);
        $namespace = array_map(static fn ($part) => ucfirst($part), $namespace);
        $namespace = implode('\\', $namespace);
        $class = ucfirst($class);

        // List is a reserved keyword in PHP, the same is in Aazsamir\Libphpsky\Generator\Maker\ClassResolver
        if ($class === 'List') {
            $class = 'ListDef';
        }

        foreach ($this->config->entries as $configEntry) {
            // that's a bit dumb but works for now
            $potentialClass = '\\' . $configEntry->namespace . '\\' . $namespace . '\\' . $class;

            if (class_exists($potentialClass)) {
                return $potentialClass;
            }
        }

        return null;
    }
}
