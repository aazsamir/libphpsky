<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Maker;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

class FileSaveClass implements SaveClass
{
    public function __construct(
        private readonly MakeConfig $config,
    ) {}

    public function save(ClassType $class, PhpNamespace $namespace): void
    {
        $namespace = $namespace->getName();

        $relativeNamespace = str_replace($this->config->namespace, '', $namespace);
        $path = rtrim($this->config->path, '/') . str_replace('\\', '/', $relativeNamespace);

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
