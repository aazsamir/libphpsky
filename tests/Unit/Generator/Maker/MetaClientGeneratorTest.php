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
    private SaveClassStub $saveClass;
    private ClassResolver $classResolver;
    private MetaClientGenerator $metaClientGenerator;
    private MakeConfigEntry $configEntry;

    protected function setUp(): void
    {
        $this->configEntry = new MakeConfigEntry(
            lexiconsPath: '',
            path: __DIR__,
            namespace: 'Tests\Fixtures',
            metaClient: true,
            generate: true,
        );
        $this->saveClass = new SaveClassStub();
        $this->classResolver = new ClassResolver();
        $this->metaClientGenerator = new MetaClientGenerator(
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
        $lexicon->setConfigEntry($this->configEntry);
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
        $lexicon->setConfigEntry($this->configEntry);
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
