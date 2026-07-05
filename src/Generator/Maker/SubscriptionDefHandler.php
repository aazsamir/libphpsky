<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Action;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\SubscriptionDef;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;

/**
 * @internal
 */
class SubscriptionDefHandler implements DefHandler
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
        if (!$def instanceof SubscriptionDef) {
            return;
        }

        [$class, $phpNamespace] = $this->createClass($def);
        $class->addTrait(\Aazsamir\Libphpsky\Generator\Prefab\IsSubscription::class);
        $class->addImplement(Action::class);

        $this->createSubscription($class, $def);

        $this->saveClass->save($class, $phpNamespace, $def->lexicon()->configEntry());
    }

    public function createSubscription(ClassType $class, SubscriptionDef $def): void
    {
        $method = $class->addMethod('subscription')->setPublic();

        $this->addSubscriptionParameters($method, $def);
        $this->addSubscriptionReturnType($method, $def);
    }

    public function addSubscriptionParameters(Method $method, SubscriptionDef $def): void
    {
        if ($def->parameters()) {
            $this->addParameters($method, $def->parameters());
        }
    }

    public function addSubscriptionReturnType(Method $method, SubscriptionDef $def): void
    {
        $body = 'return $this->createSubscription($this->argsWithKeys(func_get_args()));';
        $method->addBody($body);

        $method->setReturnType(\Aazsamir\Libphpsky\Subscription\Subscription::class);
    }

    private function classResolver(): ClassResolver
    {
        return $this->classResolver;
    }
}
