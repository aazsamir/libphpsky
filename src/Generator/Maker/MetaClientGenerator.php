<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\Property;

/**
 * @internal
 */
class MetaClientGenerator
{
    public function __construct(
        private SaveClass $saveClass,
        private ClassResolver $classResolver,
    ) {}

    public function generate(Lexicons $lexicons): void
    {
        $metaClients = [];

        foreach ($lexicons->toArray() as $lexicon) {
            if ($lexicon->configEntry()->metaClient === false) {
                continue;
            }

            if (isset($metaClients[$lexicon->configEntry()->namespace])) {
                $metaClient = $metaClients[$lexicon->configEntry()->namespace];
            } else {
                $metaClient = new ClassType('ATProtoMetaClient');
                $metaClient->addMember((new Property('client'))->setPrivate()->setType(ATProtoClientInterface::class));
                $metaClient->addMember((new Property('typeResolver'))->setPrivate()->setType(TypeResolver::class));
                $metaClient->addMember((new Property('token'))->setPrivate()->setType('string')->setNullable());
                $constructor = $metaClient->addMethod('__construct');
                $constructor->addParameter('client')->setType(ATProtoClientInterface::class)->setNullable()->setDefaultValue(null);
                $constructor->addParameter('typeResolver')->setType(TypeResolver::class)->setDefaultValue(null);
                $constructor->addParameter('token')->setType('string')->setNullable()->setDefaultValue(null);
                $constructor->addBody('if ($client === null) {');
                $constructor->addBody(\sprintf('    $client = \%s::getDefault();', ATProtoClientBuilder::class));
                $constructor->addBody('}');
                $constructor->addBody('if ($typeResolver === null) {');
                $constructor->addBody(\sprintf('    $typeResolver = \%s::default();', TypeResolver::class));
                $constructor->addBody('}');
                $constructor->addBody('$this->client = $client;');
                $constructor->addBody('$this->typeResolver = $typeResolver;');
                $constructor->addBody('$this->token = $token;');

                $metaClients[$lexicon->configEntry()->namespace] = $metaClient;
            }

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

                $type = $this->classResolver->namespaceAndClassname($def);
                $method->setReturnType($type);
                $body = \sprintf('return new %s($this->client, $this->typeResolver, $this->token);', $this->classResolver->namespaceAndClassname($def));
                $method->setBody($body);
            }
        }

        foreach ($metaClients as $namespace => $metaClient) {
            $lexicon = null;

            foreach ($lexicons->toArray() as $lx) {
                if ($lx->configEntry()->namespace === $namespace) {
                    $lexicon = $lx;

                    break;
                }
            }

            if ($lexicon === null) {
                // this should be unreachable
                throw new \RuntimeException('Lexicon not found for namespace ' . $namespace);
            }

            $namespace = new PhpNamespace(
                $lexicon->configEntry()->namespace . '\Meta',
            );

            $this->saveClass->save($metaClient, $namespace, $lexicon->configEntry());
        }
    }
}
