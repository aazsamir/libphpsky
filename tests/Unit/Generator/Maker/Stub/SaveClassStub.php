<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Maker\Stub;

use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;
use Aazsamir\Libphpsky\Generator\Maker\SaveClass;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;

class SaveClassStub implements SaveClass
{
    /** @var ClassType[] */
    public array $classes = [];
    /** @var PhpNamespace[] */
    public array $namespaces = [];

    public function save(ClassType $class, PhpNamespace $namespace, MakeConfigEntry $configEntry): void
    {
        $this->classes[] = $class;
        $this->namespaces[] = $namespace;
    }

    public function firstClass(): ?ClassType
    {
        return reset($this->classes) ?: null;
    }

    public function firstNamespace(): ?PhpNamespace
    {
        return reset($this->namespaces) ?: null;
    }

    public function lastClass(): ?ClassType
    {
        return end($this->classes) ?: null;
    }

    public function lastNamespace(): ?PhpNamespace
    {
        return end($this->namespaces) ?: null;
    }
}
