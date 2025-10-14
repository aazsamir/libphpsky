<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Loader;

use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;

/**
 * @internal
 */
final class FileLexiconProvider implements LexiconProvider
{
    public function provide(MakeConfig $config): \Generator
    {
        foreach ($config->entries as $entry) {
            $it = new \RecursiveDirectoryIterator($entry->lexiconsPath);
            $it = new \RecursiveIteratorIterator($it);

            foreach ($it as $file) {
                /** @var \SplFileInfo $file */
                if ($file->getExtension() === 'json') {
                    $data = file_get_contents($file->getPathname());

                    if ($data === false) {
                        throw new \RuntimeException('Cannot read file: ' . $file->getPathname());
                    }

                    /**
                     * @var array{
                     *  lexicon: ?int,
                     *  id: ?string,
                     *  revision?: int,
                     *  description?: ?string,
                     *  defs: ?array<string, array<string, mixed>>
                     * }|null
                     */
                    $data = json_decode($data, true);

                    if (!\is_array($data)) {
                        throw new \Exception(\sprintf('Error while decoding %s', $file));
                    }

                    if (!\is_int($data['lexicon'])) {
                        throw new \Exception(\sprintf('Lexicon name must be a string in %s', $file));
                    }

                    if (!\is_string($data['id'])) {
                        throw new \Exception(\sprintf('Lexicon id must be a string in %s', $file));
                    }

                    if (!\is_array($data['defs'])) {
                        throw new \Exception(\sprintf('Defs must be an array in %s', $file));
                    }

                    yield [$data, $entry];
                }
            }
        }
    }
}
