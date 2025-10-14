<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Loader;

use Aazsamir\Libphpsky\Generator\Loader\FileLexiconProvider;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class FileLexiconProviderTest extends TestCase
{
    private FileLexiconProvider $provider;

    protected function setUp(): void
    {
        $this->provider = new FileLexiconProvider();
    }

    public function testLoad(): void
    {
        $lexicons = $this->provider->provide($this->createMakeConfig(__DIR__ . '/res/FileLexiconProviderTest/testLoad'));
        $lexicons = iterator_to_array($lexicons);

        self::assertCount(1, $lexicons);
    }

    public function testNotAJson(): void
    {
        $lexicons = $this->provider->provide($this->createMakeConfig(__DIR__ . '/res/FileLexiconProviderTest/notAJson'));

        $this->expectException(\Exception::class);
        $lexicons = iterator_to_array($lexicons);
    }

    public function testInvalidLexicon(): void
    {
        $lexicons = $this->provider->provide($this->createMakeConfig(__DIR__ . '/res/FileLexiconProviderTest/invalidLexicon'));

        $this->expectException(\Exception::class);
        $lexicons = iterator_to_array($lexicons);
    }

    public function testInvalidID(): void
    {
        $lexicons = $this->provider->provide($this->createMakeConfig(__DIR__ . '/res/FileLexiconProviderTest/invalidId'));

        $this->expectException(\Exception::class);
        $lexicons = iterator_to_array($lexicons);
    }

    public function testInvalidDefs(): void
    {
        $lexicons = $this->provider->provide($this->createMakeConfig(__DIR__ . '/res/FileLexiconProviderTest/invalidDefs'));

        $this->expectException(\Exception::class);
        $lexicons = iterator_to_array($lexicons);
    }

    private function createMakeConfig(string $path): MakeConfig
    {
        return new MakeConfig([
            new MakeConfigEntry(
                lexiconsPath: $path,
                path: '',
                namespace: '',
                metaClient: false,
                generate: false,
            ),
        ]);
    }
}
