<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IOData;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ParamsDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Maker\ClassResolver;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\QueryDefHandler;
use Tests\Unit\Generator\Maker\Stub\SaveClassStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class QueryDefHandlerTest extends TestCase
{
    private QueryDefHandler $queryDefHandler;
    private Lexicon $lexicon;
    private SaveClassStub $saveClass;

    protected function setUp(): void
    {
        $this->saveClass = new SaveClassStub();
        $config = new MakeConfig(__DIR__, 'Tests\Fixtures');
        $classResolver = new ClassResolver($config);
        $this->queryDefHandler = new QueryDefHandler(
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

    public function testMakeQueryDefEmpty(): void
    {
        $def = new QueryDef(
            name: 'name',
            lexicon: $this->lexicon,
            description: 'description',
        );

        $this->queryDefHandler->handle($def);
        $class = $this->saveClass->lastClass();

        self::assertEquals('mixed', $class->getMethod('query')->getReturnType());
    }

    public function testMakeQueryDefWithTypes(): void
    {
        $def = new QueryDef(
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
        );

        $this->queryDefHandler->handle($def);
        $class = $this->saveClass->lastClass();

        $query = $class->getMethod('query');
        self::assertEquals('string', $query->getParameter('stringParam')->getType());
        self::assertNull($query->getParameter('stringParam')->getDefaultValue());
        self::assertEquals('array', $query->getParameter('arrayParam')->getType());
        self::assertNull($query->getParameter('arrayParam')->getDefaultValue());
        self::assertStringContainsString('@param ?array<string> $arrayParam', $query->getComment());
        self::assertEquals('int', $query->getReturnType());
    }
}
