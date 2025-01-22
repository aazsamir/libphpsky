<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\Property;

class MetaClientGenerator
{
    public function __construct(
        private MakeConfig $config,
        private SaveClass $saveClass,
        private ClassNameResolver $classNameResolver,
        private QueryDefHandler $queryDefHandler,
        private ProcedureDefHandler $procedureDefHandler,
    ) {}

    public function generate(Lexicons $lexicons): void
    {
        $config = new MakeConfig(
            path: $this->config->path . '/Meta',
            namespace: $this->config->namespace . '\Meta',
        );
        $namespace = new PhpNamespace($config->namespace);
        $metaClient = new ClassType('ATProtoMetaClient');
        $metaClient->addMember((new Property('client'))->setPrivate()->setType(ATProtoClientInterface::class));
        $metaClient->addMember((new Property('token'))->setPrivate()->setType('string')->setNullable());
        $constructor = $metaClient->addMethod('__construct');
        $constructor->addParameter('client')->setType(ATProtoClientInterface::class)->setNullable()->setDefaultValue(null);
        $constructor->addParameter('token')->setType('string')->setNullable()->setDefaultValue(null);
        $constructor->addBody('if ($client === null) {');
        $constructor->addBody(\sprintf('    $client = \%s::getDefault();', ATProtoClientBuilder::class));
        $constructor->addBody('}');
        $constructor->addBody('$this->client = $client;');
        $constructor->addBody('$this->token = $token;');

        foreach ($lexicons->toArray() as $lexicon) {
            foreach ($lexicon->defs()->toArray() as $def) {
                if (!($def instanceof QueryDef || $def instanceof ProcedureDef)) {
                    continue;
                }

                $methodname = $def->lexicon()->id();
                $methodname = explode('.', $methodname);
                $methodname = array_map(static fn ($part) => ucfirst($part), $methodname);
                $methodname = implode('', $methodname);
                $methodname = lcfirst($methodname);

                $method = $metaClient->addMethod($methodname);
                $method->setPublic();

                if ($def->description()) {
                    $method->addComment($def->description());
                }

                if ($def instanceof QueryDef) {
                    $this->queryDefHandler->addQueryParameters($method, $def);
                    $this->queryDefHandler->addQueryReturnType($method, $def);
                    $body = \sprintf('$action = new %s($this->client, $this->token);', $this->classNameResolver->namespaceAndClassname($def));
                    $method->setBody($body);
                    $method->addBody('');
                    $method->addBody('return $action->query(...func_get_args());');
                } elseif ($def instanceof ProcedureDef) {
                    $this->procedureDefHandler->addProcedureParameters($method, $def);
                    $returns = $this->procedureDefHandler->addProcedureReturnType($method, $def);
                    $body = \sprintf('$action = new %s($this->client, $this->token);', $this->classNameResolver->namespaceAndClassname($def));
                    $method->setBody($body);
                    $method->addBody('');

                    if ($returns) {
                        $method->addBody('return $action->procedure(...func_get_args());');
                    } else {
                        $method->addBody('$action->procedure(...func_get_args());');
                    }
                }
            }
        }

        $this->saveClass->save($metaClient, $namespace);
    }
}
