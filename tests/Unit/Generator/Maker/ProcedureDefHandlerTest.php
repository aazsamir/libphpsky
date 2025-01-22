<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Maker;

use Aazsamir\Libphpsky\Action;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IOData;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ParamsDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Maker\ClassResolver;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\ProcedureDefHandler;
use Tests\Unit\Generator\Maker\Stub\SaveClassStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class ProcedureDefHandlerTest extends TestCase
{
    private ProcedureDefHandler $procedureDefHandler;
    private Lexicon $lexicon;
    private SaveClassStub $saveClass;

    protected function setUp(): void
    {
        $this->saveClass = new SaveClassStub();
        $config = new MakeConfig(__DIR__, 'Tests\Fixtures');
        $classResolver = new ClassResolver($config);
        $this->procedureDefHandler = new ProcedureDefHandler(
            $classResolver,
            $this->saveClass
        );
        $this->lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon',
            revision: null,
            description: null,
        );
    }

    public function testMakeProcedureDef(): void
    {
        $def = new ProcedureDef(
            name: 'name',
            lexicon: $this->lexicon,
            description: 'description',
        );

        $this->procedureDefHandler->handle($def);
        $class = $this->saveClass->lastClass();

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
        $def = new ProcedureDef(
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
        );

        $this->procedureDefHandler->handle($def);
        $class = $this->saveClass->lastClass();

        $procedure = $class->getMethod('procedure');
        self::assertEquals('string', $procedure->getParameter('stringParam')->getType());
        self::assertNull($procedure->getParameter('stringParam')->getDefaultValue());
        self::assertEquals('array', $procedure->getParameter('arrayParam')->getType());
        self::assertNull($procedure->getParameter('arrayParam')->getDefaultValue());
        self::assertStringContainsString('@param ?array<string> $arrayParam', $procedure->getComment());
        self::assertEquals('int', $procedure->getReturnType());
    }
}
