<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;

/**
 * @internal
 */
trait DefHandlerCommon
{
    /**
     * @return array{ClassType, PhpNamespace}
     */
    private function createClass(Def $def): array
    {
        $namespace = $this->classResolver()->lexiconToNamespace($def->lexicon());
        $className = $this->classResolver()->defToClassName($def);

        $phpNamespace = new PhpNamespace($namespace);
        $class = new ClassType($className, $phpNamespace);

        $this->initializeClass($class, $def);
        $this->addCommonMethods($class);

        return [$class, $phpNamespace];
    }

    private function initializeClass(ClassType $class, Def $def): void
    {
        $class->addConstant('NAME', $def->name());
        $class->addConstant('ID', $def->lexicon()->id());

        if ($def->description()) {
            $class->addComment($def->description());
        }

        $class->addComment($def->type()->value);
    }

    private function addCommonMethods(ClassType $class): void
    {
        $class->addMethod('id')
            ->setStatic()
            ->setReturnType('string')
            ->setBody('return self::ID;');

        $class->addMethod('name')
            ->setStatic()
            ->setReturnType('string')
            ->setBody('return self::NAME;');
    }

    abstract private function classResolver(): ClassResolver;
}
