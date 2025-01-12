<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Lexicon;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\RecordDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicon;
use Tests\Unit\TestCase;

class LexiconTest extends TestCase
{
    public function testCreation(): void
    {
        $lexicon = 1;
        $id = 'id';
        $revision = 1;
        $description = 'description';
        $defs = new Defs([]);

        $item = new Lexicon(
            lexicon: $lexicon,
            id: $id,
            revision: $revision,
            description: $description,
        );
        $item->setDefs($defs);

        self::assertSame($lexicon, $item->lexicon());
        self::assertSame($id, $item->id());
        self::assertSame($revision, $item->revision());
        self::assertSame($description, $item->description());
        self::assertSame($defs, $item->defs());
    }

    public function testFindDefByRefExact(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'lexicon.id',
            revision: null,
            description: null,
        );
        $def = new StringDef(
            name: 'string',
            lexicon: $lexicon,
        );
        $lexicon->setDefs(new Defs([$def]));

        self::assertSame($def, $lexicon->findDefByRef('lexicon.id#string', null));
    }

    public function testFindDefByRefMain(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'lexicon.id',
            revision: null,
            description: null,
        );
        $def = new StringDef(
            name: 'main',
            lexicon: $lexicon,
        );
        $lexicon->setDefs(new Defs([$def]));

        self::assertSame($def, $lexicon->findDefByRef('lexicon.id', null));
    }

    public function testFindDefByShortRef(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'lexicon.id',
            revision: null,
            description: null,
        );
        $def = new StringDef(
            name: 'string',
            lexicon: $lexicon,
        );
        $lexicon->setDefs(new Defs([$def]));

        self::assertSame($def, $lexicon->findDefByRef('#string', 'lexicon.id'));
    }

    public function testFindDefByRefChildren(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'lexicon.id',
            revision: null,
            description: null,
        );
        $def = new StringDef(
            name: 'string',
            lexicon: $lexicon,
        );
        $array = new ArrayDef(
            name: 'array',
            lexicon: $lexicon,
            items: $def,
        );
        $lexicon->setDefs(new Defs([$array]));

        self::assertSame($def, $lexicon->findDefByRef('#string', 'lexicon.id'));
    }

    public function testFindDefByRefNull(): void
    {
        $lexicon = new Lexicon(
            lexicon: 1,
            id: 'lexicon.id',
            revision: null,
            description: null,
        );
        $def = new StringDef(
            name: 'string',
            lexicon: $lexicon,
        );
        $lexicon->setDefs(new Defs([$def]));

        self::assertNull($lexicon->findDefByRef('#notexisting', 'lexicon.id'));
    }
}