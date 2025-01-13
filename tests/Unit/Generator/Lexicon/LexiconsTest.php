<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Lexicon;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicons;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class LexiconsTest extends TestCase
{
    public function testLexicons(): void
    {
        $array = [
            new Lexicon(
                lexicon: 1,
                id: 'id',
                revision: 1,
                description: 'description',
            ),
            new Lexicon(
                lexicon: 1,
                id: 'id',
                revision: 1,
                description: 'description',
            ),
        ];

        $lexicons = new Lexicons($array);
        self::assertSame($array, $lexicons->toArray());
    }

    public function testFindDefByRef(): void
    {
        $first = new Lexicon(
            lexicon: 1,
            id: 'first',
            revision: null,
            description: null,
        );
        $firstdef = new StringDef(
            name: 'firststring',
            lexicon: $first,
        );
        $first->setDefs(new Defs([
            $firstdef,
        ]));

        $second = new Lexicon(
            lexicon: 2,
            id: 'second',
            revision: null,
            description: null,
        );
        $seconddef = new StringDef(
            name: 'secondstring',
            lexicon: $second,
        );
        $second->setDefs(new Defs([
            $seconddef,
        ]));

        $lexicons = new Lexicons([$first, $second]);

        $findby = 'first#firststring';
        $found = $lexicons->findDefByRef($findby);
        self::assertSame($firstdef, $found);

        $findby = 'second#secondstring';
        $found = $lexicons->findDefByRef($findby);
        self::assertSame($seconddef, $found);
    }
}
