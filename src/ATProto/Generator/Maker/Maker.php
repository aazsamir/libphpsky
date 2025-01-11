<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Maker;

use Aazsamir\Libphpsky\ATProto\Action;
use Aazsamir\Libphpsky\ATProto\ATProtoObject;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\BlobDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\BooleanDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\BytesDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\CidLinkDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\DefContainer;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\HasDescription;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\RefDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\TokenDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\UnknownDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicons;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use Nette\PhpGenerator\Type;

class Maker
{
    private MakeConfig $config;
    /**
     * @var array<string, bool>
     */
    private array $resolved = [];

    public function make(MakeConfig $config, Lexicons $lexicons): void
    {
        $this->config = $config;

        try {
            foreach ($lexicons->toArray() as $lexicon) {
                foreach ($lexicon->defs()->toArray() as $def) {
                    $this->makeDef($config, $def);
                }
            }
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    private function makeDef(MakeConfig $config, Def $def): void
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

        $namespace = $this->lexiconToNamespace($config, $def->lexicon());
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

        switch (true) {
            case $def instanceof QueryDef:
                $class->addTrait('\Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery');
                $class->addImplement(Action::class);
                $method = new Method('query');
                $method->setPublic();

                if ($def->parameters()) {
                    foreach ($def->parameters()->properties()->toArray() as $property) {
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

                $class->addMember($method);

                $this->saveClass($class, $phpNamespace);

                break;

            case $def instanceof ProcedureDef:
                $class->addTrait('\Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure');
                $class->addImplement(Action::class);
                $method = new Method('procedure');
                $method->setPublic();

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
                } else {
                    $method->setReturnType('void');
                    $body = '$this->request($this->argsWithKeys(func_get_args()));';
                    $method->addBody($body);
                }

                $class->addMember($method);

                $this->saveClass($class, $phpNamespace);

                break;

            case $def instanceof ObjectDef:
                $class->addTrait('\Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray');
                $class->addImplement(ATProtoObject::class);
                $constructorTypes = [];

                foreach ($def->properties()->toArray() as $property) {
                    $propertyName = $property->name();
                    $property = $this->unref($property);
                    $phpProperty = $class->addProperty($propertyName);
                    $phpPropertyType = $this->namespaceAndClassname($property);
                    $nullable = empty($def->required())
                        || !\in_array($property->name(), $def->required(), true);

                    if ($nullable) {
                        $phpProperty->setNullable($nullable);
                        $phpProperty->setValue(null);
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
                    }

                    if ($property instanceof ArrayDef) {
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
                        $parameter->setDefaultValue(null);
                    }

                    $constructor->addBody('$instance->' . $type['name'] . ' = $' . $type['name'] . ';');
                }

                $constructor->addBody('');
                $constructor->addBody('return $instance;');

                $this->saveClass($class, $phpNamespace);

                break;
        }

        if ($def instanceof DefContainer) {
            foreach ($def->defs()->toArray() as $subdef) {
                $this->makeDef($config, $subdef);
            }
        }
    }

    private function lexiconToNamespace(MakeConfig $config, Lexicon $lexicon): string
    {
        $id = $lexicon->id();
        $id = explode('.', $id);
        $namespace = $config->namespace;
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
            case $def instanceof StringDef:
            case $def instanceof CidLinkDef:
            case $def instanceof BlobDef:
            case $def instanceof TokenDef:
                return 'string';
            case $def instanceof IntegerDef:
                return 'int';
            case $def instanceof BooleanDef:
                return 'bool';
            case $def instanceof ArrayDef:
                $item = $this->unref($def->items());

                return 'array<'.$this->defToClassName($item) .'>';
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

        $namespace = $this->lexiconToNamespace($this->config, $def->lexicon());
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
            'Parent' => 'ParentDef',
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
            || $def instanceof UnknownDef
        ;
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

        $namespace = $this->lexiconToNamespace($this->config, $def->lexicon());

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
        $namespace = $namespace->getName();

        $relativeNamespace = str_replace($this->config->namespace, '', $namespace);
        $path = rtrim($this->config->path, '/') . str_replace('\\', '/', $relativeNamespace);

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $filepath = $class->getName();
        $filepath = $path . '/' . $filepath . '.php';

        $phpFile = new PhpFile();
        $phpFile->addNamespace($namespace)->add($class);
        $phpFile->setStrictTypes(true);

        $printer = new PsrPrinter();
        $printer->setTypeResolving(true);

        file_put_contents($filepath, $printer->printFile($phpFile));
    }
}
