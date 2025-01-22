<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IOData;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Tests\Unit\Generator\Maker\Stub\SaveClassStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class MetaClientGeneratorTest extends TestCase
{
    private MakeConfig $config;
    private SaveClassStub $saveClass;
    private ClassResolver $classResolver;
    private QueryDefHandler $queryDefHandler;
    private ProcedureDefHandler $procedureDefHandler;
    private MetaClientGenerator $metaClientGenerator;

    protected function setUp(): void
    {
        $this->config = new MakeConfig(
            __DIR__,
            'Tests\Fixtures',
        );
        $this->saveClass = new SaveClassStub();
        $this->classResolver = new ClassResolver($this->config);
        $this->queryDefHandler = new QueryDefHandler(
            $this->classResolver,
            $this->saveClass,
        );
        $this->procedureDefHandler = new ProcedureDefHandler(
            $this->classResolver,
            $this->saveClass,
        );
        $this->metaClientGenerator = new MetaClientGenerator(
            $this->config,
            $this->saveClass,
            $this->classResolver,
            $this->queryDefHandler,
            $this->procedureDefHandler,
        );
    }

    public function testMakeMetaClientQuery(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon',
            revision: null,
            description: 'lexicon description',
        );
        $lexicon->setDefs(new Defs([
            new QueryDef(
                name: 'query',
                lexicon: $lexicon,
                description: 'description',
                output: new IOData(
                    encoding: 'application/json',
                    description: 'output description',
                    schema: new IntegerDef(
                        name: 'output',
                        lexicon: $lexicon,
                    ),
                )
            ),
        ]));

        $this->metaClientGenerator->generate(new Lexicons([$lexicon]));
        $class = $this->saveClass->lastClass();

        self::assertEquals('ATProtoMetaClient', $class->getName());
        $method = $class->getMethod('testlexicon');
        self::assertEquals('testLexicon', $method->getName());
        self::assertNotEmpty($method->getBody());
        self::assertEquals('int', $method->getReturnType());
    }

    public function testMakeMetaClientProcedure(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon',
            revision: null,
            description: 'lexicon description',
        );
        $lexicon->setDefs(new Defs([
            new ProcedureDef(
                name: 'query',
                lexicon: $lexicon,
                description: 'description',
                output: new IOData(
                    encoding: 'application/json',
                    description: 'output description',
                    schema: new IntegerDef(
                        name: 'output',
                        lexicon: $lexicon,
                    ),
                )
            ),
        ]));

        $this->metaClientGenerator->generate(new Lexicons([$lexicon]));
        $class = $this->saveClass->lastClass();

        self::assertEquals('ATProtoMetaClient', $class->getName());
        $method = $class->getMethod('testlexicon');
        self::assertEquals('testLexicon', $method->getName());
        self::assertNotEmpty($method->getBody());
        self::assertEquals('int', $method->getReturnType());
    }
}
