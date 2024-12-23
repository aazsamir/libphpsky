<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\LexiconType;

class QueryDef implements Def, HasDescription, DefContainer
{
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly ?string $description = null,
        private readonly ?ParamsDef $parameters = null,
        private readonly ?IOData $output = null,
        // TODO: errors
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::QUERY;
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

    public function parameters(): ?ParamsDef
    {
        return $this->parameters;
    }

    public function output(): ?IOData
    {
        return $this->output;
    }

    public function defs(): Defs
    {
        $arr = [];

        if ($this->parameters !== null) {
            $arr[] = $this->parameters;
        }
        if ($this->output !== null && $this->output->schema() !== null) {
            $arr[] = $this->output->schema();
        }

        return new Defs($arr);
    }
}
