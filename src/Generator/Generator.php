<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\DefContainer;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\RefDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Loader\FileLexiconProvider;
use Aazsamir\Libphpsky\Generator\Loader\Loader;
use Aazsamir\Libphpsky\Generator\Maker\FileSaveClass;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\Maker;

class Generator
{
    public function generate(): Lexicons
    {
        $path = __DIR__ . '/../../atproto/lexicons';
        $loader = new Loader(
            lexiconProvider: new FileLexiconProvider($path),
        );
        $lexicons = $loader->load();
        $this->resolveRefs($lexicons);

        $config = new MakeConfig(
            path: __DIR__ . '/../Model',
            namespace: 'Aazsamir\Libphpsky\Model',
        );
        $saver = new FileSaveClass($config);
        $maker = new Maker(
            $config,
            $saver,
        );
        $maker->make($lexicons);

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
