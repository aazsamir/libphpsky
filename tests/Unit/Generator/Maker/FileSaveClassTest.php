<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Maker\FileSaveClass;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class FileSaveClassTest extends TestCase
{
    private FileSaveClass $fileSaveClass;
    private MakeConfig $makeConfig;
    private string $path = __DIR__ . '/artifacts';

    protected function setUp(): void
    {
        $this->deleteDir();
        $this->makeConfig = new MakeConfig(
            path: $this->path,
            namespace: 'Tests\Artifacts',
        );
        $this->fileSaveClass = new FileSaveClass($this->makeConfig);
    }

    protected function tearDown(): void
    {
        $this->deleteDir();
    }

    private function deleteDir(): void
    {
        $dir = $this->path;
        $files = array_diff(scandir($dir) ?: [], ['.', '..']);

        foreach ($files as $file) {
            unlink("$dir/$file");
        }

        rmdir($dir);
    }

    public function testSave(): void
    {
        $class = new ClassType('TestClass');
        $namespace = new PhpNamespace($this->makeConfig->namespace);

        $this->fileSaveClass->save($class, $namespace);

        self::assertFileExists($this->path . '/TestClass.php');

        $content = file_get_contents($this->path . '/TestClass.php');

        self::assertStringContainsString('declare(strict_types=1);', $content);
        self::assertStringContainsString('namespace Tests\Artifacts;', $content);
        self::assertStringContainsString('class TestClass', $content);
    }
}
