<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

/**
 * @internal
 */
final class FileSaveClass implements SaveClass
{
    public function save(ClassType $class, PhpNamespace $namespace, MakeConfigEntry $configEntry): void
    {
        if ($configEntry->generate === false) {
            return;
        }

        $namespace = $namespace->getName();

        $relativeNamespace = str_replace($configEntry->namespace, '', $namespace);
        $path = rtrim($configEntry->path, '/') . str_replace('\\', '/', $relativeNamespace);

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $filepath = $class->getName();
        $filepath = $path . '/' . $filepath . '.php';

        $phpFile = new PhpFile();
        $phpFile->addNamespace($namespace)->add($class);
        $phpFile->setStrictTypes(true);

        $printer = new PsrPrinter();
        $printer->setTypeResolving(true);

        file_put_contents($filepath, $printer->printFile($phpFile));
    }
}
