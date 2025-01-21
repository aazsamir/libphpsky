<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final class RecordDef implements Def, DefContainer
{
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        // TODO: Record Key Type
        private readonly string $key,
        private readonly ObjectDef $record,
        private readonly ?string $description = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::RECORD;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function key(): string
    {
        return $this->key;
    }

    public function record(): ObjectDef
    {
        return $this->record;
    }

    public function defs(): Defs
    {
        return new Defs([$this->record]);
    }
}
