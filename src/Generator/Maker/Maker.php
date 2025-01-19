<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Action;
use Aazsamir\Libphpsky\ATProtoObject;
use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BlobDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BooleanDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BytesDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\CidLinkDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\DefContainer;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\HasDescription;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\RefDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\TokenDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnknownDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\Property;
use Nette\PhpGenerator\Type;

class Maker
{
    /**
     * @var array<string, bool>
     */
    private array $resolved = [];

    public function __construct(
        private MakeConfig $config,
        private SaveClass $saveClass,
    ) {}

    public function make(Lexicons $lexicons): void
    {
        foreach ($lexicons->toArray() as $lexicon) {
            foreach ($lexicon->defs()->toArray() as $def) {
                $this->makeDef($def);
            }
        }

        $this->makeMetaClient($lexicons);
    }

    private function makeDef(Def $def): void
    {
        $def = $this->unref($def);
        $defname = $def->lexicon()->id() . '#' . $def->name();

        if (\array_key_exists($defname, $this->resolved)) {
            return;
        }

        $this->resolved[$defname] = true;

        if ($this->skipCreation($def)) {
            return;
        }

        $namespace = $this->lexiconToNamespace($def->lexicon());
        $classname = $this->defToClassName($def);

        $phpNamespace = new PhpNamespace($namespace);
        $class = new ClassType(
            name: $classname,
            namespace: $phpNamespace,
        );

        $class->addConstant('NAME', $def->name());
        $class->addConstant('ID', $def->lexicon()->id());

        if ($def instanceof HasDescription && $def->description()) {
            $class->addComment($def->description());
        }

        $class->addComment($def->type()->value);

        $class->addMethod('id')
            ->setStatic()
            ->setReturnType('string')
            ->setBody('return self::ID;');

        $class->addMethod('name')
            ->setStatic()
            ->setReturnType('string')
            ->setBody('return self::NAME;');

        switch (true) {
            case $def instanceof QueryDef:
                $class->addTrait('\Aazsamir\Libphpsky\Generator\Prefab\IsQuery');
                $class->addImplement(Action::class);
                $method = $class->addMethod('query');
                $method->setPublic();

                $this->addQueryParameters($method, $def);
                $this->addQueryReturnType($method, $def);

                $this->saveClass($class, $phpNamespace);

                break;

            case $def instanceof ProcedureDef:
                $class->addTrait('\Aazsamir\Libphpsky\Generator\Prefab\IsProcedure');
                $class->addImplement(Action::class);
                $method = $class->addMethod('procedure');
                $method->setPublic();

                $this->addProcedureParameters($method, $def);
                $this->addProcedureReturnType($method, $def);

                $this->saveClass($class, $phpNamespace);

                break;

            case $def instanceof ObjectDef:
                $class->addTrait('\Aazsamir\Libphpsky\Generator\Prefab\FromArray');
                $class->addTrait('\Aazsamir\Libphpsky\Generator\Prefab\ToArray');
                $class->addImplement(ATProtoObject::class);

                $constructorTypes = $this->addObjectParameters($class, $def);
                $this->addObjectConstructor($class, $def, $constructorTypes);

                $this->saveClass($class, $phpNamespace);

                break;
        }

        if ($def instanceof DefContainer) {
            foreach ($def->defs()->toArray() as $subdef) {
                $this->makeDef($subdef);
            }
        }
    }

    private function addQueryParameters(Method $method, QueryDef $def): void
    {
        if ($def->parameters()) {
            $properties = $def->parameters()->properties()->toArray();

            // sort by nullability
            $required = $def->parameters()->required() ?? [];
            usort($properties, static fn ($a, $b) => !\in_array($a->name(), $required, true) <=> !\in_array($b->name(), $required, true));

            foreach ($properties as $property) {
                $propertyName = $property->name();
                $property = $this->unref($property);
                $parameter = $method->addParameter($propertyName);
                $parameterType = $this->namespaceAndClassname($property);
                $nullable = !\in_array($propertyName, $def->parameters()->required() ?? [], true);

                if ($property instanceof ArrayDef) {
                    $parameter->setType('array');
                    $method->addComment(
                        '@param '
                            . ($nullable ? '?' : '')
                            . $parameterType
                            . ' $' . $propertyName
                    );
                } else {
                    $parameter->setType($parameterType);
                }

                if ($nullable) {
                    $parameter->setNullable(true)->setDefaultValue(null);
                }
            }
        }
    }

    private function addQueryReturnType(Method $method, QueryDef $def): void
    {
        if ($def->output() && $def->output()->schema()) {
            $return = $this->unref($def->output()->schema());

            if ($return instanceof ArrayDef) {
                $method->setReturnType('array');
                $method->addComment('@return ' . $this->namespaceAndClassname($return));
            } else {
                $returnType = $this->namespaceAndClassname($return);
                $method->setReturnType($returnType);
                $body = \sprintf('return %s::fromArray($this->request($this->argsWithKeys(func_get_args())));', $returnType);
                $method->addBody($body);
            }
        } else {
            $method->setReturnType('mixed');
            $body = 'return $this->request($this->argsWithKeys(func_get_args()));';
            $method->addBody($body);
        }
    }

    private function addProcedureParameters(Method $method, ProcedureDef $def): void
    {
        if ($def->parameters()) {
            foreach ($def->parameters()->properties()->toArray() as $property) {
                $propertyName = $property->name();
                $property = $this->unref($property);
                $parameter = $method->addParameter($propertyName);
                $parameterType = $this->namespaceAndClassname($property);

                if ($property instanceof ArrayDef) {
                    $parameter->setType('array');
                    $method->addComment('@param ' . $parameterType . ' $' . $propertyName);
                } else {
                    $parameter->setType($parameterType);
                }
            }
        }

        if ($def->input() && $def->input()->schema()) {
            $input = $this->unref($def->input()->schema());
            $inputType = $this->namespaceAndClassname($input);

            if ($input instanceof ArrayDef) {
                $method->addParameter('input')->setType('array');
                $method->addComment('@param ' . $inputType . ' $input');
            } else {
                $method->addParameter('input')->setType($inputType);
            }
        }
    }

    private function addProcedureReturnType(Method $method, ProcedureDef $def): bool
    {
        if ($def->output() && $def->output()->schema()) {
            $return = $this->unref($def->output()->schema());
            $returnType = $this->namespaceAndClassname($return);

            if ($return instanceof ArrayDef) {
                $method->setReturnType('array');
                $method->addComment('@return ' . $returnType);
            } else {
                $method->setReturnType($returnType);
                $body = \sprintf('return %s::fromArray($this->request($this->argsWithKeys(func_get_args())));', $returnType);
                $method->addBody($body);
            }

            return true;
        }

        $method->setReturnType('void');
        $body = '$this->request($this->argsWithKeys(func_get_args()));';
        $method->addBody($body);

        return false;
    }

    /**
     * @return array<array{name: string, type: string, nullable: bool, comment: string|null}>
     */
    private function addObjectParameters(ClassType $class, ObjectDef $def): array
    {
        $constructorTypes = [];

        foreach ($def->properties()->toArray() as $property) {
            $propertyName = $property->name();
            $property = $this->unref($property);
            $phpProperty = $class->addProperty($propertyName);
            $phpPropertyType = $this->namespaceAndClassname($property);
            $required = $def->required() ? \in_array($property->name(), $def->required(), true) : false;
            $nullable = $def->nullable() ? \in_array($property->name(), $def->nullable(), true) : false;

            if ($nullable) {
                $phpProperty->setValue(null);
            }

            $nullable = $nullable || !$required;

            if ($nullable) {
                $phpProperty->setNullable($nullable);
            }

            if ($property instanceof ArrayDef) {
                $phpProperty->setType('array');
                if ($nullable) {
                    $phpProperty->addComment('@var ' . $phpPropertyType . '|null');
                } else {
                    $phpProperty->addComment('@var ' . $phpPropertyType);
                }
            } elseif ($property instanceof UnionDef) {
                $phpProperty->setType('mixed');
                $types = [];

                foreach ($property->resolvedRefs() as $type) {
                    $types[] = $this->namespaceAndClassname($type);
                }

                if ($types) {
                    if ($nullable) {
                        $types[] = 'null';
                    }

                    $types = Type::union(...$types);

                    $phpProperty->addComment('@var ' . $types);
                }
            } else {
                $phpProperty->setType($phpPropertyType);
            }

            if ($property instanceof ArrayDef) {
                $phpProperty->setValue([]);
                $constructorTypes[] = [
                    'name' => $propertyName,
                    'type' => 'array',
                    'nullable' => $nullable,
                    'comment' => '@param ' . $phpPropertyType . ' $' . $propertyName,
                ];
            } else {
                $constructorTypes[] = [
                    'name' => $propertyName,
                    'type' => $phpPropertyType,
                    'nullable' => $nullable,
                    'comment' => null,
                ];
            }
        }

        $nullableMethod = $class->addMethod('nullable');
        $nullableMethod->setPublic();
        $nullableMethod->setReturnType('array');
        $nullableMethod->setStatic();
        $nullableMethod->addBody('return [' . implode(', ', array_map(static fn ($name) => "'$name'", $def->nullable() ?? [])) . '];');

        $requiredMethod = $class->addMethod('required');
        $requiredMethod->setPublic();
        $requiredMethod->setReturnType('array');
        $requiredMethod->setStatic();
        $requiredMethod->addBody('return [' . implode(', ', array_map(static fn ($name) => "'$name'", $def->required() ?? [])) . '];');

        return $constructorTypes;
    }

    /**
     * @param array<array{name: string, type: string, nullable: bool, comment: string|null}> $constructorTypes
     */
    private function addObjectConstructor(ClassType $class, ObjectDef $def, array $constructorTypes): void
    {
        // nullable last
        usort($constructorTypes, static fn ($a, $b) => $a['nullable'] <=> $b['nullable']);
        $constructor = $class->addMethod('new')->setStatic()->setReturnType('self');
        $constructor->addBody('$instance = new self();');

        foreach ($constructorTypes as $type) {
            $parameter = $constructor->addParameter($type['name']);
            $parameter->setType($type['type']);
            $parameter->setNullable($type['nullable']);

            if ($type['comment']) {
                $constructor->addComment($type['comment']);
            }

            if ($type['nullable']) {
                if ($type['type'] === 'array') {
                    $parameter->setDefaultValue([]);
                } else {
                    $parameter->setDefaultValue(null);
                }

                $nullable = $def->nullable() ? \in_array($type['name'], $def->nullable(), true) : false;

                if ($nullable) {
                    $constructor->addBody('$instance->' . $type['name'] . ' = $' . $type['name'] . ';');
                } else {
                    $constructor->addBody(\sprintf('if ($%s !== null) {', $type['name']));
                    $constructor->addBody(\sprintf('    $instance->%s = $%s;', $type['name'], $type['name']));
                    $constructor->addBody('}');
                }
            } else {
                $constructor->addBody(\sprintf('$instance->%s = $%s;', $type['name'], $type['name']));
            }
        }

        $constructor->addBody('');
        $constructor->addBody('return $instance;');
    }

    private function lexiconToNamespace(Lexicon $lexicon): string
    {
        $id = $lexicon->id();
        $id = explode('.', $id);
        $namespace = $this->config->namespace;
        $namespace = rtrim($namespace, '\\');

        foreach ($id as $idElement) {
            $idElement = ucfirst($idElement);
            $namespace .= '\\' . $idElement;
        }

        return $namespace;
    }

    private function defToClassName(Def $def): string
    {
        switch (true) {
            case $def instanceof BytesDef:
            case $def instanceof CidLinkDef:
            case $def instanceof BlobDef:
            case $def instanceof TokenDef:
                return 'string';
            case $def instanceof StringDef:
                if ($def->format() === 'datetime') {
                    return 'DateTimeInterface';
                }

                return 'string';
            case $def instanceof IntegerDef:
                return 'int';
            case $def instanceof BooleanDef:
                return 'bool';
            case $def instanceof ArrayDef:
                $item = $this->unref($def->items());

                return 'array<' . $this->defToClassName($item) . '>';
            case $def instanceof UnionDef:
                $types = [];

                foreach ($def->resolvedRefs() as $type) {
                    $types[] = $this->namespaceAndClassname($type);
                }

                if (empty($types)) {
                    return 'mixed';
                }

                return implode('|', $types);
            case $def instanceof UnknownDef:
                return 'mixed';
        }

        $namespace = $this->lexiconToNamespace($def->lexicon());
        // last element of the namespace
        $last = explode('\\', $namespace);
        $last = end($last);

        $classname = ucfirst($def->name());
        $classname = match ($classname) {
            'Main' => $last,
            default => $classname,
        };

        return match ($classname) {
            'List' => 'ListDef',
            default => $classname,
        };
    }

    private function isPhpPrimitive(Def $def): bool
    {
        return
            $def instanceof BytesDef
            || $def instanceof StringDef
            || $def instanceof CidLinkDef
            || $def instanceof BlobDef
            || $def instanceof TokenDef
            || $def instanceof IntegerDef
            || $def instanceof BooleanDef
            || $def instanceof UnknownDef;
    }

    private function skipCreation(Def $def): bool
    {
        return $this->isPhpPrimitive($def) || $def instanceof ArrayDef || $def instanceof UnionDef;
    }

    private function namespaceAndClassname(Def $def): string
    {
        $classname = $this->defToClassName($def);

        if ($this->isPhpPrimitive($def)) {
            return $classname;
        }

        $nonArrayClassname = $classname;
        $nonArrayClassname = str_replace('array<', '', $nonArrayClassname);
        $nonArrayClassname = str_replace('>', '', $nonArrayClassname);

        if (\in_array($nonArrayClassname, ['int', 'bool', 'string', 'mixed', 'array'], true)) {
            return $classname;
        }

        if ($def instanceof UnionDef) {
            return $classname;
        }

        if ($def instanceof ArrayDef) {
            $def = $this->unref($def->items());

            return 'array<' . $this->namespaceAndClassname($def) . '>';
        }

        $namespace = $this->lexiconToNamespace($def->lexicon());

        return '\\' . $namespace . '\\' . $classname;
    }

    private function unref(Def $def): Def
    {
        if ($def instanceof RefDef) {
            return $this->unref($def->resolvedDef());
        }

        return $def;
    }

    private function saveClass(ClassType $class, PhpNamespace $namespace): void
    {
        $this->saveClass->save($class, $namespace);
    }

    private function makeMetaClient(Lexicons $lexicons): void
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
                    $this->addQueryParameters($method, $def);
                    $this->addQueryReturnType($method, $def);
                    $body = \sprintf('$action = new %s($this->client, $this->token);', $this->namespaceAndClassname($def));
                    $method->setBody($body);
                    $method->addBody('');
                    $method->addBody('return $action->query(...func_get_args());');
                } elseif ($def instanceof ProcedureDef) {
                    $this->addProcedureParameters($method, $def);
                    $returns = $this->addProcedureReturnType($method, $def);
                    $body = \sprintf('$action = new %s($this->client, $this->token);', $this->namespaceAndClassname($def));
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

        $this->saveClass($metaClient, $namespace);
    }
}
