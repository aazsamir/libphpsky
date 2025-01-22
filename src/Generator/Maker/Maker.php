<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\DefContainer;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;

/**
 * @internal
 */
final class Maker
{
    use Unref;

    /**
     * @var array<string, bool>
     */
    private array $resolved = [];

    public function __construct(
        private ClassNameResolver $classNameResolver,
        private QueryDefHandler $queryDefHandler,
        private ObjectDefHandler $objectDefHandler,
        private ProcedureDefHandler $procedureDefHandler,
        private MetaClientGenerator $metaClientGenerator,
    ) {
        $this->classNameResolver = $classNameResolver;
        $this->queryDefHandler = $queryDefHandler;
        $this->procedureDefHandler = $procedureDefHandler;
    }

    public function make(Lexicons $lexicons): void
    {
        $this->processLexicons($lexicons);
        $this->metaClientGenerator->generate($lexicons);
    }

    private function processLexicons(Lexicons $lexicons): void
    {
        foreach ($lexicons->toArray() as $lexicon) {
            foreach ($lexicon->defs()->toArray() as $def) {
                $this->processDef($def);
            }
        }
    }

    private function processDef(Def $def): void
    {
        $def = $this->unref($def);
        $defId = $this->createDefIdentifier($def);

        if (isset($this->resolved[$defId])) {
            return;
        }

        $this->resolved[$defId] = true;

        if ($this->shouldSkipDef($def)) {
            return;
        }

        match (true) {
            $def instanceof QueryDef => $this->queryDefHandler->handle($def),
            $def instanceof ProcedureDef => $this->procedureDefHandler->handle($def),
            $def instanceof ObjectDef => $this->objectDefHandler->handle($def),
            default => null,
        };

        if ($def instanceof DefContainer) {
            $this->processDefContainer($def);
        }
    }

    private function createDefIdentifier(Def $def): string
    {
        return $def->lexicon()->id() . '#' . $def->name();
    }

    private function shouldSkipDef(Def $def): bool
    {
        return $this->classNameResolver->isPhpPrimitive($def)
            || $def instanceof ArrayDef
            || $def instanceof UnionDef;
    }

    private function processDefContainer(DefContainer $def): void
    {
        foreach ($def->defs()->toArray() as $subDef) {
            $this->processDef($subDef);
        }
    }
}
