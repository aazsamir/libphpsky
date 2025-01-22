<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Action;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;

class QueryDefHandler implements DefHandler
{
    use AddParameters;
    use DefHandlerCommon;
    use Unref;

    public function __construct(
        private ClassNameResolver $classNameResolver,
        private SaveClass $saveClass,
    ) {}

    public function handle(Def $def): void
    {
        if (!$def instanceof QueryDef) {
            return;
        }

        [$class, $phpNamespace] = $this->createClass($def);
        $this->createQuery($class, $def);

        $this->saveClass->save($class, $phpNamespace);
    }

    public function createQuery(ClassType $class, QueryDef $def): void
    {
        $class->addTrait('\Aazsamir\Libphpsky\Generator\Prefab\IsQuery');
        $class->addImplement(Action::class);
        $method = $class->addMethod('query');
        $method->setPublic();

        $this->addQueryParameters($method, $def);
        $this->addQueryReturnType($method, $def);
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
            $returnType = $this->classNameResolver->namespaceAndClassname($return);
            $method->setReturnType($returnType);
            $body = \sprintf('return %s::fromArray($this->request($this->argsWithKeys(func_get_args())));', $returnType);
            $method->addBody($body);

            return;
        }

        $method->setReturnType('mixed');
        $body = 'return $this->request($this->argsWithKeys(func_get_args()));';
        $method->addBody($body);
    }

    private function classResolver(): ClassNameResolver
    {
        return $this->classNameResolver;
    }
}
