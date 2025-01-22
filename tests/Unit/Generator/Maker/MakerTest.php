<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Maker;

use Aazsamir\Libphpsky\Action;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IOData;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ParamsDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Maker\ClassResolver;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\Maker;
use Aazsamir\Libphpsky\Generator\Maker\MetaClientGenerator;
use Aazsamir\Libphpsky\Generator\Maker\ObjectDefHandler;
use Aazsamir\Libphpsky\Generator\Maker\ProcedureDefHandler;
use Aazsamir\Libphpsky\Generator\Maker\QueryDefHandler;
use Nette\PhpGenerator\ClassType;
use Tests\Unit\Generator\Maker\Stub\SaveClassStub;
use Tests\Unit\TestCase;

/**
 * @internal
 *
 * @todo Split into separate tests
 */
final class MakerTest extends TestCase
{
    private SaveClassStub $saveClass;
    private MakeConfig $makeConfig;
    private ClassResolver $classResolver;
    private QueryDefHandler $queryDefHandler;
    private ProcedureDefHandler $procedureDefHandler;
    private ObjectDefHandler $objectDefHandler;
    private MetaClientGenerator $metaClientGenerator;
    private Lexicon $lexicon;

    protected function setUp(): void
    {
        $this->saveClass = new SaveClassStub();
        $this->makeConfig = new MakeConfig(
            path: __DIR__ . '/res/output',
            namespace: 'Artifact\Namespace',
        );
        $this->lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon',
            revision: null,
            description: 'lexicon description',
        );
        $this->classResolver = new ClassResolver($this->makeConfig);
        $this->queryDefHandler = new QueryDefHandler($this->classResolver, $this->saveClass);
        $this->procedureDefHandler = new ProcedureDefHandler($this->classResolver, $this->saveClass);
        $this->objectDefHandler = new ObjectDefHandler($this->classResolver, $this->saveClass);
        $this->metaClientGenerator = new MetaClientGenerator(
            $this->makeConfig,
            $this->saveClass,
            $this->classResolver,
            $this->queryDefHandler,
            $this->procedureDefHandler,
        );
    }

    public function testMakeQueryDef(): void
    {
        $class = $this->makeWithDef(new QueryDef(
            name: 'name',
            lexicon: $this->lexicon,
            description: 'description',
        ));

        self::assertEquals('Name', $class->getName());
        $traits = array_keys($class->getTraits());
        self::assertContains('\Aazsamir\Libphpsky\Generator\Prefab\IsQuery', $traits);
        self::assertStringContainsString('description', $class->getComment());
        self::assertContains(Action::class, $class->getImplements());
        $nameconst = $class->getConstant('NAME');
        self::assertEquals('name', $nameconst->getValue());
        $idconst = $class->getConstant('ID');
        self::assertEquals('test.lexicon', $idconst->getValue());
        $querymethod = $class->getMethod('query');
        self::assertNotEmpty($querymethod->getBody());
    }

    public function testMakeQueryDefEmpty(): void
    {
        $class = $this->makeWithDef(new QueryDef(
            name: 'name',
            lexicon: $this->lexicon,
            description: 'description',
        ));

        self::assertEquals('mixed', $class->getMethod('query')->getReturnType());
    }

    public function testMakeQueryDefWithTypes(): void
    {
        $class = $this->makeWithDef(new QueryDef(
            name: 'name',
            lexicon: $this->lexicon,
            description: 'description',
            parameters: new ParamsDef(
                name: 'params',
                lexicon: $this->lexicon,
                properties: new Defs([
                    new StringDef(
                        name: 'stringParam',
                        lexicon: $this->lexicon,
                    ),
                    new ArrayDef(
                        name: 'arrayParam',
                        lexicon: $this->lexicon,
                        items: new StringDef(
                            name: 'stringItem',
                            lexicon: $this->lexicon,
                        ),
                    ),
                ]),
            ),
            output: new IOData(
                encoding: 'application/json',
                description: 'output description',
                schema: new IntegerDef(
                    name: 'output',
                    lexicon: $this->lexicon,
                ),
            ),
        ));

        $query = $class->getMethod('query');
        self::assertEquals('string', $query->getParameter('stringParam')->getType());
        self::assertNull($query->getParameter('stringParam')->getDefaultValue());
        self::assertEquals('array', $query->getParameter('arrayParam')->getType());
        self::assertNull($query->getParameter('arrayParam')->getDefaultValue());
        self::assertStringContainsString('@param ?array<string> $arrayParam', $query->getComment());
        self::assertEquals('int', $query->getReturnType());
    }

    public function testMakeProcedureDef(): void
    {
        $class = $this->makeWithDef(new ProcedureDef(
            name: 'name',
            lexicon: $this->lexicon,
            description: 'description',
        ));

        self::assertEquals('Name', $class->getName());
        $traits = array_keys($class->getTraits());
        self::assertContains('\Aazsamir\Libphpsky\Generator\Prefab\IsProcedure', $traits);
        self::assertStringContainsString('description', $class->getComment());
        self::assertContains(Action::class, $class->getImplements());
        $nameconst = $class->getConstant('NAME');
        self::assertEquals('name', $nameconst->getValue());
        $idconst = $class->getConstant('ID');
        self::assertEquals('test.lexicon', $idconst->getValue());
        $proceduremethod = $class->getMethod('procedure');
        self::assertNotEmpty($proceduremethod->getBody());
    }

    public function testMakeProcedureDefWithTypes(): void
    {
        $class = $this->makeWithDef(new ProcedureDef(
            name: 'name',
            lexicon: $this->lexicon,
            description: 'description',
            parameters: new ParamsDef(
                name: 'params',
                lexicon: $this->lexicon,
                properties: new Defs([
                    new StringDef(
                        name: 'stringParam',
                        lexicon: $this->lexicon,
                    ),
                    new ArrayDef(
                        name: 'arrayParam',
                        lexicon: $this->lexicon,
                        items: new StringDef(
                            name: 'stringItem',
                            lexicon: $this->lexicon,
                        ),
                    ),
                ]),
            ),
            input: new IOData(
                encoding: 'application/json',
                description: 'input description',
                schema: new IntegerDef(
                    name: 'input',
                    lexicon: $this->lexicon,
                ),
            ),
            output: new IOData(
                encoding: 'application/json',
                description: 'output description',
                schema: new IntegerDef(
                    name: 'output',
                    lexicon: $this->lexicon,
                ),
            ),
        ));

        $procedure = $class->getMethod('procedure');
        self::assertEquals('string', $procedure->getParameter('stringParam')->getType());
        self::assertNull($procedure->getParameter('stringParam')->getDefaultValue());
        self::assertEquals('array', $procedure->getParameter('arrayParam')->getType());
        self::assertNull($procedure->getParameter('arrayParam')->getDefaultValue());
        self::assertStringContainsString('@param ?array<string> $arrayParam', $procedure->getComment());
        self::assertEquals('int', $procedure->getReturnType());
    }

    public function testMakeObjectDef(): void
    {
        $class = $this->makeWithDef(new ObjectDef(
            name: 'name',
            lexicon: $this->lexicon,
            properties: new Defs([
                new StringDef(
                    name: 'stringProp',
                    lexicon: $this->lexicon,
                ),
            ]),
        ));

        self::assertEquals('Name', $class->getName());
        $traits = array_keys($class->getTraits());
        self::assertContains('\Aazsamir\Libphpsky\Generator\Prefab\FromArray', $traits);
        $nameconst = $class->getConstant('NAME');
        self::assertEquals('name', $nameconst->getValue());
        $idconst = $class->getConstant('ID');
        self::assertEquals('test.lexicon', $idconst->getValue());
        self::assertEquals('string', $class->getProperty('stringProp')->getType());

        $constructor = $class->getMethod('new');
        self::assertNotEmpty($constructor->getBody());
    }

    public function testMakeMetaClient(): void
    {
        $this->makeWithDef(new QueryDef(
            name: 'name',
            lexicon: $this->lexicon,
            description: 'description',
            output: new IOData(
                encoding: 'application/json',
                description: 'output description',
                schema: new IntegerDef(
                    name: 'output',
                    lexicon: $this->lexicon,
                ),
            )
        ));

        $class = $this->saveClass->lastClass();

        self::assertEquals('ATProtoMetaClient', $class->getName());
        $method = $class->getMethod('testlexicon');
        self::assertEquals('testLexicon', $method->getName());
        self::assertNotEmpty($method->getBody());
        self::assertEquals('int', $method->getReturnType());
    }

    private function makeWithDef(Def $def): ClassType
    {
        $this->lexicon->setDefs(new Defs([$def]));
        $lexicons = new Lexicons([$this->lexicon]);

        $maker = new Maker(
            $this->classResolver,
            $this->queryDefHandler,
            $this->objectDefHandler,
            $this->procedureDefHandler,
            $this->metaClientGenerator,
        );

        $maker->make($lexicons);

        return $this->saveClass->firstClass();
    }
}
