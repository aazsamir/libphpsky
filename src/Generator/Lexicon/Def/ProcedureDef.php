<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final readonly class ProcedureDef implements Def, DefContainer
{
    public function __construct(
        private string $name,
        private Lexicon $lexicon,
        private ?string $description = null,
        private ?ParamsDef $parameters = null,
        private ?IOData $output = null,
        private ?IOData $input = null,
        // TODO: errors
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::PROCEDURE;
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

    public function input(): ?IOData
    {
        return $this->input;
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

        if ($this->input !== null && $this->input->schema() !== null) {
            $arr[] = $this->input->schema();
        }

        return new Defs($arr);
    }
}
