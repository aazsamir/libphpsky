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
            $this->addClassDeprecated($class, $def);
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

    private function addClassDeprecated(ClassType $class, Def $def): void
    {
        if ($this->isDeprecated($def->description())) {
            $deprecatedComment = $this->extractDeprecatedComment($def->description());
            $class->addComment('@deprecated ' . ($deprecatedComment ?? ''));
        }
    }

    private function isDeprecated(?string $description): bool
    {
        if ($description === null) {
            return false;
        }

        return str_contains(strtolower($description), 'deprecated');
    }

    private function extractDeprecatedComment(?string $description): ?string
    {
        if ($description === null) {
            return null;
        }

        $description = strtolower($description);
        $deprecatedPos = strpos($description, 'deprecated');

        if ($deprecatedPos === false) {
            return null;
        }

        // find until `. ` or until the end of the string
        $afterDeprecated = substr($description, $deprecatedPos + \strlen('deprecated'));
        $afterDeprecated = trim($afterDeprecated, "\n\r\t\v\0 :.,-");
        $endingPos = strpos($afterDeprecated, '. ');
        $endingPos2 = strpos($afterDeprecated, '--');
        $endingPos = min(
            $endingPos !== false ? $endingPos : \PHP_INT_MAX,
            $endingPos2 !== false ? $endingPos2 : \PHP_INT_MAX,
        );

        if ($endingPos !== \PHP_INT_MAX) {
            $afterDeprecated = substr($afterDeprecated, 0, $endingPos);
        }

        return trim($afterDeprecated, "\n\r\t\v\0 :.,-");
    }

    abstract private function classResolver(): ClassResolver;
}
