<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Action;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;

/**
 * @internal
 */
class QueryDefHandler implements DefHandler
{
    use AddParameters;
    use DefHandlerCommon;
    use Unref;

    public function __construct(
        private ClassResolver $classResolver,
        private SaveClass $saveClass,
    ) {}

    public function handle(Def $def): void
    {
        if (!$def instanceof QueryDef) {
            return;
        }

        [$class, $phpNamespace] = $this->createClass($def);
        $class->addTrait('\Aazsamir\Libphpsky\Generator\Prefab\IsQuery');
        $class->addImplement(Action::class);

        $this->createQuery($class, $def);
        $this->createRawQuery($class, $def);

        $this->saveClass->save($class, $phpNamespace);
    }

    public function createQuery(ClassType $class, QueryDef $def): void
    {
        $method = $class->addMethod('query')->setPublic();

        $this->addQueryParameters($method, $def);
        $this->addQueryReturnType($method, $def);
    }

    public function createRawQuery(ClassType $class, QueryDef $def): void
    {
        $method = $class->addMethod('rawQuery')->setPublic();

        $this->addQueryParameters($method, $def);
        $this->addRawQueryReturnType($method, $def);
    }

    public function addQueryParameters(Method $method, QueryDef $def): void
    {
        if ($def->parameters()) {
            $this->addParameters($method, $def->parameters());
        }
    }

    public function addQueryReturnType(Method $method, QueryDef $def): void
    {
        if ($def->output() && $def->output()->schema()) {
            $return = $this->unref($def->output()->schema());
            $returnType = $this->classResolver->namespaceAndClassname($return);
            $method->setReturnType($returnType);
            $body = \sprintf('return %s::fromArray($this->request($this->argsWithKeys(func_get_args())));', $returnType);
            $method->addBody($body);

            return;
        }

        $method->setReturnType('mixed');
        $body = 'return $this->request($this->argsWithKeys(func_get_args()));';
        $method->addBody($body);
    }

    public function addRawQueryReturnType(Method $method, QueryDef $def): void
    {
        if ($def->output() && $def->output()->schema()) {
            $method->addComment('@return array<string, mixed>');
            $method->setReturnType('array');
            // TODO: get rid of this and prove that output is an array, or return mixed
            $method->addBody('// @phpstan-ignore-next-line');
        } else {
            $method->setReturnType('mixed');
        }

        $body = 'return $this->request($this->argsWithKeys(func_get_args()));';
        $method->addBody($body);
    }

    private function classResolver(): ClassResolver
    {
        return $this->classResolver;
    }
}
