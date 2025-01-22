<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Action;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;

class ProcedureDefHandler implements DefHandler
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
        if (!$def instanceof ProcedureDef) {
            return;
        }

        [$class, $phpNamespace] = $this->createClass($def);
        $this->createProcedure($class, $def);

        $this->saveClass->save($class, $phpNamespace);
    }

    public function createProcedure(ClassType $class, ProcedureDef $def): void
    {
        $class->addTrait('\Aazsamir\Libphpsky\Generator\Prefab\IsProcedure');
        $class->addImplement(Action::class);
        $method = $class->addMethod('procedure');
        $method->setPublic();

        $this->addProcedureParameters($method, $def);
        $this->addProcedureReturnType($method, $def);
    }

    public function addProcedureParameters(Method $method, ProcedureDef $def): void
    {
        if ($def->parameters()) {
            $this->addParameters($method, $def->parameters());
        }

        if ($def->input() && $def->input()->schema()) {
            $input = $this->unref($def->input()->schema());
            $inputType = $this->classResolver->namespaceAndClassname($input);
            $method->addParameter('input')->setType($inputType);
        }
    }

    public function addProcedureReturnType(Method $method, ProcedureDef $def): bool
    {
        if ($def->output() && $def->output()->schema()) {
            $return = $this->unref($def->output()->schema());
            $returnType = $this->classResolver->namespaceAndClassname($return);
            $method->setReturnType($returnType);
            $body = \sprintf('return %s::fromArray($this->request($this->argsWithKeys(func_get_args())));', $returnType);
            $method->addBody($body);

            return true;
        }

        $method->setReturnType('void');
        $body = '$this->request($this->argsWithKeys(func_get_args()));';
        $method->addBody($body);

        return false;
    }

    private function classResolver(): ClassResolver
    {
        return $this->classResolver;
    }
}
