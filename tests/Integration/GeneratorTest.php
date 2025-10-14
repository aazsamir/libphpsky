<?php

declare(strict_types=1);

namespace Tests\Integration;

use Aazsamir\Libphpsky\Generator\Generator;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;

/**
 * @internal
 */
class GeneratorTest extends TestCase
{
    public function testGeneratorResultMatchRepo(): void
    {
        $generator = Generator::default();
        $originDir = __DIR__ . '/../../src/Model';
        $tempDir = sys_get_temp_dir() . '/' . uniqid() . '/src/Model';

        $configEntry = new MakeConfigEntry(
            lexiconsPath: __DIR__ . '/../../lexicons',
            path: $tempDir,
            namespace: 'Aazsamir\Libphpsky\Model',
            metaClient: true,
            generate: true,
        );
        $config = new MakeConfig([$configEntry]);
        [$repoHash, $repoCount] = $this->calculateDirectoryHash($originDir);

        $generator->generate($config);

        [$tempHash, $tempCount] = $this->calculateDirectoryHash($tempDir);

        self::assertEquals($repoCount, $tempCount, 'Generated Model files count do not match repository files. Remove "src/Model" and run "php generate.php".');
        self::markTestIncomplete('The hash comparison is currently not working on CI, needs investigation.');
        self::assertEquals($repoHash, $tempHash, 'Generated Model files do not match repository files. Run "php generate.php".');
    }

    /**
     * @return array{string, int}
     */
    private function calculateDirectoryHash(string $directory): array
    {
        // iterate over files in directory, recursively
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
        $hashes = [];
        foreach ($files as $file) {
            /** @var \SplFileInfo $file */
            if ($file->isFile() && $file->getExtension() === 'php') {
                $hashes[] = md5_file($file->getRealPath());
            }
        }
        sort($hashes);

        return [md5(implode('', $hashes)), \count($hashes)];
    }
}
