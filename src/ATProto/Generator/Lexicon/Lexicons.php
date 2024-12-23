<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Lexicon;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\DefContainer;

class Lexicons
{
    /**
     * @param Lexicon[] $lexicons
     */
    public function __construct(
        private readonly array $lexicons,
    ) {}

    /**
     * @return Lexicon[]
     */
    public function toArray(): array
    {
        return $this->lexicons;
    }

    public function findDefByRef(string $ref): ?Def
    {
        return $this->findByRef($ref);
    }

    public function findByRef(string $ref): ?Def
    {
        foreach ($this->lexicons as $lex) {
            $found = $lex->findDefByRef($ref, null);

            if ($found !== null) {
                return $found;
            }
        }

        return null;
    }

    /**
     * @return iterable<Def>
     */
    public function defs(): iterable
    {
        foreach ($this->lexicons as $lex) {
            foreach ($lex->defs()->toArray() as $def) {
                yield from $this->yieldFrom($def);
            }
        }
    }

    /**
     * @return iterable<Def>
     */
    private function yieldFrom(Def $def): iterable
    {
        if ($def instanceof DefContainer) {
            foreach ($def->defs()->toArray() as $subdef) {
                yield from $this->yieldFrom($subdef);
            }
        }

        yield $def;
    }
}
