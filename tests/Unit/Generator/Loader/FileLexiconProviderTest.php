<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Loader;

use Aazsamir\Libphpsky\Generator\Loader\FileLexiconProvider;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class FileLexiconProviderTest extends TestCase
{
    public function testLoad(): void
    {
        $path = __DIR__ . '/res/FileLexiconProviderTest/testLoad';
        $loader = new FileLexiconProvider($path);
        $lexicons = $loader->provide();
        $lexicons = iterator_to_array($lexicons);

        self::assertCount(1, $lexicons);
    }

    public function testInvalidPath(): void
    {
        $this->expectException(\RuntimeException::class);

        new FileLexiconProvider('/invalid/path');
    }

    public function testNotAJson(): void
    {
        $path = __DIR__ . '/res/FileLexiconProviderTest/notAJson';
        $loader = new FileLexiconProvider($path);
        $lexicons = $loader->provide();

        $this->expectException(\Exception::class);
        $lexicons = iterator_to_array($lexicons);
    }

    public function testInvalidLexicon(): void
    {
        $path = __DIR__ . '/res/FileLexiconProviderTest/invalidLexicon';
        $loader = new FileLexiconProvider($path);
        $lexicons = $loader->provide();

        $this->expectException(\Exception::class);
        $lexicons = iterator_to_array($lexicons);
    }

    public function testInvalidID(): void
    {
        $path = __DIR__ . '/res/FileLexiconProviderTest/invalidId';
        $loader = new FileLexiconProvider($path);
        $lexicons = $loader->provide();

        $this->expectException(\Exception::class);
        $lexicons = iterator_to_array($lexicons);
    }

    public function testInvalidDefs(): void
    {
        $path = __DIR__ . '/res/FileLexiconProviderTest/invalidDefs';
        $loader = new FileLexiconProvider($path);
        $lexicons = $loader->provide();

        $this->expectException(\Exception::class);
        $lexicons = iterator_to_array($lexicons);
    }
}
