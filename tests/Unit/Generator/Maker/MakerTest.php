<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\RefDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\SubscriptionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Maker\ClassResolver;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;
use Aazsamir\Libphpsky\Generator\Maker\Maker;
use Aazsamir\Libphpsky\Generator\Maker\MetaClientGenerator;
use Aazsamir\Libphpsky\Generator\Maker\ObjectDefHandler;
use Aazsamir\Libphpsky\Generator\Maker\ProcedureDefHandler;
use Aazsamir\Libphpsky\Generator\Maker\QueryDefHandler;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class MakerTest extends TestCase
{
    private ClassResolver $classResolver;
    private QueryDefHandler&MockObject $queryDefHandler;
    private ProcedureDefHandler&MockObject $procedureDefHandler;
    private ObjectDefHandler&MockObject $objectDefHandler;
    private MetaClientGenerator&MockObject $metaClientGenerator;
    private Maker $maker;
    private Lexicon $lexicon;

    protected function setUp(): void
    {
        $configEntry = new MakeConfigEntry(
            lexiconsPath: __DIR__,
            path: __DIR__ . '/res/output',
            namespace: 'Artifact\Namespace',
            metaClient: true,
            generate: true,
        );
        $this->lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon',
            revision: null,
            description: 'lexicon description',
        );
        $this->lexicon->setConfigEntry($configEntry);
        $this->classResolver = new ClassResolver();
        $this->queryDefHandler = $this->createMock(QueryDefHandler::class);
        $this->procedureDefHandler = $this->createMock(ProcedureDefHandler::class);
        $this->objectDefHandler = $this->createMock(ObjectDefHandler::class);
        $this->metaClientGenerator = $this->createMock(MetaClientGenerator::class);

        $this->maker = new Maker(
            $this->classResolver,
            $this->queryDefHandler,
            $this->objectDefHandler,
            $this->procedureDefHandler,
            $this->metaClientGenerator,
        );
    }

    public function testHandle(): void
    {
        $lexicons = new Lexicons([
            $this->lexicon,
        ]);
        $this->lexicon->setDefs(new Defs([
            new QueryDef(
                name: 'query',
                lexicon: $this->lexicon,
            ),
            new ProcedureDef(
                name: 'procedure',
                lexicon: $this->lexicon,
            ),
            new ObjectDef(
                name: 'object',
                lexicon: $this->lexicon,
                properties: new Defs([]),
            ),
            new SubscriptionDef(
                name: 'subscription',
                lexicon: $this->lexicon,
            ),
        ]));

        $this->queryDefHandler->expects(self::once())
            ->method('handle')
            ->with(self::isInstanceOf(QueryDef::class));

        $this->procedureDefHandler->expects(self::once())
            ->method('handle')
            ->with(self::isInstanceOf(ProcedureDef::class));

        $this->objectDefHandler->expects(self::once())
            ->method('handle')
            ->with(self::isInstanceOf(ObjectDef::class));

        $this->maker->make($lexicons);
    }

    public function testHandleContainer(): void
    {
        $lexicons = new Lexicons([
            $this->lexicon,
        ]);
        $this->lexicon->setDefs(new Defs([
            new ArrayDef(
                name: 'array',
                lexicon: $this->lexicon,
                items: new ObjectDef(
                    name: 'integer',
                    lexicon: $this->lexicon,
                    properties: new Defs([]),
                ),
            ),
        ]));

        $this->objectDefHandler->expects(self::once())
            ->method('handle')
            ->with(self::isInstanceOf(ObjectDef::class));

        $this->maker->make($lexicons);
    }

    public function testHandleSameObject(): void
    {
        $lexicons = new Lexicons([
            $this->lexicon,
        ]);
        $def = new ObjectDef(
            name: 'object',
            lexicon: $this->lexicon,
            properties: new Defs([]),
        );
        $this->lexicon->setDefs(new Defs([
            $def,
            $def,
        ]));

        $this->objectDefHandler->expects(self::once())
            ->method('handle')
            ->with(self::isInstanceOf(ObjectDef::class));

        $this->maker->make($lexicons);
    }

    public function testHandleRef(): void
    {
        $lexicons = new Lexicons([
            $this->lexicon,
        ]);
        $def = new ObjectDef(
            name: 'object',
            lexicon: $this->lexicon,
            properties: new Defs([]),
        );
        $ref = new RefDef(
            name: 'ref',
            lexicon: $this->lexicon,
            ref: '#object',
        );
        $ref->setResolvedDef($def);
        $this->lexicon->setDefs(new Defs([$ref]));

        $this->objectDefHandler->expects(self::once())
            ->method('handle')
            ->with(self::isInstanceOf(ObjectDef::class));

        $this->maker->make($lexicons);
    }
}
