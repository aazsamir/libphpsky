<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Loader;

use Generator;

class FileLexiconProvider implements LexiconProvider
{
    private string $path;

    public function __construct(
        string $path
    ) {
        $path = \realpath($path);

        if ($path === false) {
            throw new \RuntimeException('Path not found: ' . $path);
        }

        $this->path = $path;
    }

    public function provide(): Generator
    {
        $it = new \RecursiveDirectoryIterator($this->path);
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

                yield $data;
            }
        }
    }
}
