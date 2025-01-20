<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final class ProcedureDef implements Def, HasDescription, DefContainer
{
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly ?string $description = null,
        private readonly ?ParamsDef $parameters = null,
        private readonly ?IOData $output = null,
        private readonly ?IOData $input = null,
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
