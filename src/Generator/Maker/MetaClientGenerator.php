<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\SubscriptionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactory;
use Aazsamir\Libphpsky\Jetstream\WebSocketClientFactoryInterface;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\Property;

/**
 * @internal
 */
readonly class MetaClientGenerator
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
                $metaClient->addMember((new Property('wssClientFactory'))->setPrivate()->setType(WebSocketClientFactoryInterface::class));
                $metaClient->addMember((new Property('typeResolver'))->setPrivate()->setType(TypeResolver::class));
                $metaClient->addMember((new Property('token'))->setPrivate()->setType('string')->setNullable());
                $this->addConstructor($metaClient);
                $this->addDefaultMethod($metaClient);
                $this->addGetClientMethod($metaClient);
                $metaClients[$lexicon->configEntry()->namespace] = $metaClient;
            }

            foreach ($lexicon->defs()->toArray() as $def) {
                if (!($def instanceof QueryDef || $def instanceof ProcedureDef || $def instanceof SubscriptionDef)) {
                    continue;
                }

                $methodname = $def->lexicon()->id();
                $methodname = explode('.', $methodname);
                $methodname = array_map(static fn ($part): string => ucfirst($part), $methodname);
                $methodname = implode('', $methodname);
                $methodname = lcfirst($methodname);

                $method = $metaClient->addMethod($methodname);
                $method->setPublic();

                if ($def->description()) {
                    $method->addComment($def->description());
                }

                $type = $this->classResolver->namespaceAndClassname($def);
                $method->setReturnType($type);

                if ($def instanceof SubscriptionDef) {
                    $body = \sprintf('return new %s($this->wssClientFactory, $this->typeResolver, $this->token);', $this->classResolver->namespaceAndClassname($def));
                } else {
                    $body = \sprintf('return new %s($this->client, $this->typeResolver, $this->token);', $this->classResolver->namespaceAndClassname($def));
                }

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

    private function addConstructor(ClassType $metaClient): void
    {
        $constructor = $metaClient->addMethod('__construct');
        $constructor->addParameter('client')->setType(ATProtoClientInterface::class)->setNullable()->setDefaultValue(null);
        $constructor->addParameter('wssClientFactory')->setType(WebSocketClientFactoryInterface::class)->setNullable()->setDefaultValue(null);
        $constructor->addParameter('typeResolver')->setType(TypeResolver::class)->setDefaultValue(null);
        $constructor->addParameter('token')->setType('string')->setNullable()->setDefaultValue(null);
        $constructor->addBody('if ($client === null || $typeResolver === null || $wssClientFactory === null) {');
        $constructor->addBody('    \trigger_deprecation(');
        $constructor->addBody('        \'aazsamir/libphpsky\',');
        $constructor->addBody('        \'0.10.0\',');
        $constructor->addBody('        \'ATProtoMetaClient::__construct() without arguments is deprecated, use ATProtoMetaClient::default() instead.\',');
        $constructor->addBody('    );');
        $constructor->addBody('}');
        $constructor->addBody('if ($client === null) {');
        $constructor->addBody(\sprintf('    $client = \%s::getDefault();', ATProtoClientBuilder::class));
        $constructor->addBody('}');
        $constructor->addBody('if ($wssClientFactory === null) {');
        $constructor->addBody(\sprintf('    $wssClientFactory = new \%s();', WebSocketClientFactory::class));
        $constructor->addBody('}');
        $constructor->addBody('if ($typeResolver === null) {');
        $constructor->addBody(\sprintf('    $typeResolver = \%s::getDefault();', TypeResolver::class));
        $constructor->addBody('}');
        $constructor->addBody('$this->client = $client;');
        $constructor->addBody('$this->wssClientFactory = $wssClientFactory;');
        $constructor->addBody('$this->typeResolver = $typeResolver;');
        $constructor->addBody('$this->token = $token;');
    }

    private function addDefaultMethod(ClassType $metaClient): void
    {
        $method = $metaClient->addMethod('default');
        $method->setStatic();
        $method->setPublic();
        $method->setReturnType('self');
        $method->addParameter('client')->setType(ATProtoClientInterface::class)->setNullable()->setDefaultValue(null);
        $method->addParameter('wssClientFactory')->setType(WebSocketClientFactoryInterface::class)->setNullable()->setDefaultValue(null);
        $method->addParameter('typeResolver')->setType(TypeResolver::class)->setNullable()->setDefaultValue(null);
        $method->addParameter('token')->setType('string')->setNullable()->setDefaultValue(null);
        $method->addBody('if ($client === null) {');
        $method->addBody(\sprintf('    $client = \%s::getDefault();', ATProtoClientBuilder::class));
        $method->addBody('}');
        $method->addBody('if ($wssClientFactory === null) {');
        $method->addBody(\sprintf('    $wssClientFactory = new \%s();', WebSocketClientFactory::class));
        $method->addBody('}');
        $method->addBody('if ($typeResolver === null) {');
        $method->addBody(\sprintf('    $typeResolver = \%s::getDefault();', TypeResolver::class));
        $method->addBody('}');
        $method->addBody(\sprintf('return new %s(', $metaClient->getName()));
        $method->addBody('    $client,');
        $method->addBody('    $wssClientFactory,');
        $method->addBody('    $typeResolver,');
        $method->addBody('    $token,');
        $method->addBody(');');
    }

    private function addGetClientMethod(ClassType $metaClient): void
    {
        $method = $metaClient->addMethod('getClient');
        $method->setPublic();
        $method->setReturnType(ATProtoClientInterface::class);
        $method->addBody('return $this->client;');
    }
}
