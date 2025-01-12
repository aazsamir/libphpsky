<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\DefContainer;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\RefDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\ATProto\Generator\Loader\Loader;
use Aazsamir\Libphpsky\ATProto\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\ATProto\Generator\Maker\Maker;

class Generator
{
    public function generate(): Lexicons
    {
        $path = __DIR__ . '/../../../atproto/lexicons';
        $loader = new Loader();
        $lexicons = $loader->load($path);
        $this->resolveRefs($lexicons);

        $config = new MakeConfig(
            path: __DIR__ . '/../Model',
            namespace: 'Aazsamir\Libphpsky\ATProto\Model',
        );
        $maker = new Maker();
        $maker->make($config, $lexicons);

        return $lexicons;
    }

    private function resolveRefs(Lexicons $lexicons): Lexicons
    {
        foreach ($lexicons->toArray() as $lexicon) {
            $this->resolveLexicon($lexicons, $lexicon);
        }

        return $lexicons;
    }

    private function resolveLexicon(Lexicons $lexicons, Lexicon $lexicon): void
    {
        foreach ($lexicon->defs()->toArray() as $def) {
            $this->resolveDef($lexicons, $lexicon, $def);
        }
    }

    private function resolveDef(Lexicons $lexicons, Lexicon $lexicon, Def $def): void
    {
        switch (true) {
            case $def instanceof DefContainer:
                foreach ($def->defs()->toArray() as $def) {
                    $this->resolveDef($lexicons, $lexicon, $def);
                }

                return;

            case $def instanceof UnionDef:
                $refs = [];

                foreach ($def->refs() as $ref) {
                    $found = $lexicon->findDefByRef($ref, $lexicon->id());

                    if ($found === null) {
                        $found = $lexicons->findDefByRef($ref);
                    }

                    if ($found !== null) {
                        $refs[] = $found;
                    }
                }

                $def->setResolvedRefs($refs);

                return;
        }

        if (!($def instanceof RefDef)) {
            return;
        }

        $refid = $def->ref();

        if (!str_contains($refid, '#')) {
            $refid .= '#main';
        }

        $referenced = $lexicon->findDefByRef($refid, $lexicon->id());

        if ($referenced === null) {
            $referenced = $lexicons->findDefByRef($refid);
        }

        if ($referenced === null) {
            throw new \RuntimeException("Cannot find referenced def: {$refid}");
        }

        $def->setResolvedDef($referenced);
    }
}
