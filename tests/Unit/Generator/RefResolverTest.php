<?php

declare(strict_types=1);

namespace Tests\Unit\Generator;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\RefDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\RefResolver;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class RefResolverTest extends TestCase
{
    public function testResolveSameLexicon(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon.first',
            revision: 1,
            description: null,
        );
        $stringdef = new StringDef(
            name: 'string',
            lexicon: $lexicon,
        );
        $refdef = new RefDef(
            name: 'ref',
            lexicon: $lexicon,
            ref: '#string',
        );
        $defs = new Defs([
            $stringdef,
            $refdef,
        ]);
        $lexicon->setDefs($defs);
        $lexicons = new Lexicons([
            $lexicon,
        ]);

        $resolver = new RefResolver();
        $resolver->resolveRefs($lexicons);

        self::assertSame($stringdef, $refdef->resolvedDef());
    }

    public function testResolveUnionRef(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon.first',
            revision: 1,
            description: null,
        );
        $stringdef = new StringDef(
            name: 'string',
            lexicon: $lexicon,
        );
        $uniondef = new UnionDef(
            name: 'ref',
            lexicon: $lexicon,
            refs: [
                '#string',
            ],
        );
        $defs = new Defs([
            $stringdef,
            $uniondef,
        ]);
        $lexicon->setDefs($defs);
        $lexicons = new Lexicons([
            $lexicon,
        ]);

        $resolver = new RefResolver();
        $resolver->resolveRefs($lexicons);

        self::assertSame([$stringdef], $uniondef->resolvedRefs());
    }

    public function testResolveBetweenTwoLexicons(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon.first',
            revision: 1,
            description: null,
        );
        $secondLexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon.second',
            revision: 1,
            description: null,
        );
        $stringdef = new StringDef(
            name: 'main',
            lexicon: $lexicon,
        );
        $refdef = new RefDef(
            name: 'ref',
            lexicon: $secondLexicon,
            ref: 'test.lexicon.first',
        );
        $defs = new Defs([
            $stringdef,
        ]);
        $lexicon->setDefs($defs);
        $defs = new Defs([
            $refdef,
        ]);
        $secondLexicon->setDefs($defs);
        $lexicons = new Lexicons([
            $lexicon,
            $secondLexicon,
        ]);

        $resolver = new RefResolver();
        $resolver->resolveRefs($lexicons);

        self::assertSame($stringdef, $refdef->resolvedDef());
    }

    public function testResolveInArray(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon.first',
            revision: 1,
            description: null,
        );
        $stringdef = new StringDef(
            name: 'string',
            lexicon: $lexicon,
        );
        $refdef = new RefDef(
            name: 'ref',
            lexicon: $lexicon,
            ref: '#string',
        );
        $arraydef = new ArrayDef(
            name: 'array',
            lexicon: $lexicon,
            items: $refdef,
        );
        $defs = new Defs([
            $stringdef,
            $arraydef,
        ]);
        $lexicon->setDefs($defs);
        $lexicons = new Lexicons([
            $lexicon,
        ]);

        $resolver = new RefResolver();
        $resolver->resolveRefs($lexicons);

        /** @var RefDef $ref */
        $ref = $arraydef->items();
        self::assertSame($stringdef, $ref->resolvedDef());
    }

    public function testResolveUnionBetweenTwoLexicons(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon.first',
            revision: 1,
            description: null,
        );
        $secondLexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon.second',
            revision: 1,
            description: null,
        );
        $stringdef = new StringDef(
            name: 'main',
            lexicon: $lexicon,
        );
        $uniondef = new UnionDef(
            name: 'ref',
            lexicon: $secondLexicon,
            refs: [
                'test.lexicon.first',
            ],
        );
        $defs = new Defs([
            $stringdef,
        ]);
        $lexicon->setDefs($defs);
        $defs = new Defs([
            $uniondef,
        ]);
        $secondLexicon->setDefs($defs);
        $lexicons = new Lexicons([
            $lexicon,
            $secondLexicon,
        ]);

        $resolver = new RefResolver();
        $resolver->resolveRefs($lexicons);

        self::assertSame([$stringdef], $uniondef->resolvedRefs());
    }

    public function testNonExistingRef(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon.first',
            revision: 1,
            description: null,
        );
        $stringdef = new StringDef(
            name: 'string',
            lexicon: $lexicon,
        );
        $refdef = new RefDef(
            name: 'ref',
            lexicon: $lexicon,
            ref: 'test.lexicon.first#null',
        );
        $defs = new Defs([
            $stringdef,
            $refdef,
        ]);
        $lexicon->setDefs($defs);
        $lexicons = new Lexicons([
            $lexicon,
        ]);

        $resolver = new RefResolver();

        $this->expectException(\RuntimeException::class);
        $resolver->resolveRefs($lexicons);
    }
}
