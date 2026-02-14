<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

final readonly class PermissionDef implements Def
{
    /**
     * @param string[]|null $lxm
     * @param string[]|null $action
     * @param string[]|null $collection
     */
    public function __construct(
        private Lexicon $lexicon,
        private string $resource,
        private ?bool $inheritAud = null,
        private ?array $lxm = null,
        private ?array $action = null,
        private ?array $collection = null,
        private ?string $description = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::PERMISSION;
    }

    public function name(): string
    {
        return 'noname';
    }

    public function lexicon(): Lexicon
    {
        return $this->lexicon;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function resource(): string
    {
        return $this->resource;
    }

    public function inheritAud(): ?bool
    {
        return $this->inheritAud;
    }

    /**
     * @return string[]|null
     */
    public function lxm(): ?array
    {
        return $this->lxm;
    }

    /**
     * @return string[]|null
     */
    public function action(): ?array
    {
        return $this->action;
    }

    /**
     * @return string[]|null
     */
    public function collection(): ?array
    {
        return $this->collection;
    }
}
