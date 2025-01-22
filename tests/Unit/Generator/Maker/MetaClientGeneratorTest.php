<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\Defs;
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
    private MetaClientGenerator $metaClientGenerator;

    protected function setUp(): void
    {
        $this->config = new MakeConfig(
            __DIR__,
            'Tests\Fixtures',
        );
        $this->saveClass = new SaveClassStub();
        $this->classResolver = new ClassResolver($this->config);
        $this->metaClientGenerator = new MetaClientGenerator(
            $this->config,
            $this->saveClass,
            $this->classResolver,
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
            ),
        ]));

        $this->metaClientGenerator->generate(new Lexicons([$lexicon]));
        $class = $this->saveClass->lastClass();

        self::assertEquals('ATProtoMetaClient', $class->getName());
        $method = $class->getMethod('testlexicon');
        self::assertEquals('testLexicon', $method->getName());
        self::assertNotEmpty($method->getBody());
        self::assertEquals('\Tests\Fixtures\Test\Lexicon\Query', $method->getReturnType());
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
                name: 'Procedure',
                lexicon: $lexicon,
                description: 'description',
            ),
        ]));

        $this->metaClientGenerator->generate(new Lexicons([$lexicon]));
        $class = $this->saveClass->lastClass();

        self::assertEquals('ATProtoMetaClient', $class->getName());
        $method = $class->getMethod('testlexicon');
        self::assertEquals('testLexicon', $method->getName());
        self::assertNotEmpty($method->getBody());
        self::assertEquals('\Tests\Fixtures\Test\Lexicon\Procedure', $method->getReturnType());
    }
}
