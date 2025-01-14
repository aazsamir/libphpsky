<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Maker;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;

interface SaveClass
{
    public function save(ClassType $class, PhpNamespace $namespace): void;
}