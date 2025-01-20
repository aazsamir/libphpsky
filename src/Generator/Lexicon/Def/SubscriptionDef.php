<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

/**
 * @internal
 */
final class SubscriptionDef implements Def, HasDescription, DefContainer
{
    public function __construct(
        private readonly string $name,
        private readonly Lexicon $lexicon,
        private readonly ?string $description = null,
        private readonly ?ParamsDef $parameters = null,
        private readonly ?Message $message = null,
        // TODO: errors
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::SUBSCRIPTION;
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

    public function message(): ?Message
    {
        return $this->message;
    }

    public function defs(): Defs
    {
        $defs = [];

        if ($this->parameters !== null) {
            $defs[] = $this->parameters;
        }

        if ($this->message !== null) {
            $defs[] = $this->message->schema();
        }

        return new Defs($defs);
    }
}
