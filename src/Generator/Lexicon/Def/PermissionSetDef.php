<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Lexicon\Def;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;

final readonly class PermissionSetDef implements Def
{
    /**
     * @param PermissionDef[] $permissions
     */
    public function __construct(
        private string $name,
        private Lexicon $lexicon,
        private string $title,
        private string $detail,
        private array $permissions = [],
        private ?string $description = null,
    ) {}

    public function type(): LexiconType
    {
        return LexiconType::PERMISSION_SET;
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

    public function title(): string
    {
        return $this->title;
    }

    public function detail(): string
    {
        return $this->detail;
    }

    /**
     * @return PermissionDef[]
     */
    public function permissions(): array
    {
        return $this->permissions;
    }
}
