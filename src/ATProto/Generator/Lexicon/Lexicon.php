<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Lexicon;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\DefContainer;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Defs;

class Lexicon
{
    private Defs $defs;

    public function __construct(
        private int $lexicon,
        private string $id,
        private ?int $revision,
        private ?string $description,
    ) {}

    public function lexicon(): int
    {
        return $this->lexicon;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function revision(): ?int
    {
        return $this->revision;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function defs(): Defs
    {
        return $this->defs;
    }

    public function setDefs(Defs $defs): void
    {
        $this->defs = $defs;
    }

    public function findDefByRef(string $ref, ?string $lexicon): ?Def
    {
        // if there is no # in the ref, it means we are looking for a `main` def
        // and given ref is the lexicon id
        if (!str_contains($ref, '#')) {
            $name = 'main';
            $lexicon = $ref;
        } else {
            // otherwise, it is member of lexicon
            $exploded = explode('#', $ref);

            // if the first element is empty, it means the ref starts with # and will point to "current" lexicon
            if ($exploded[0] === '') {
                $exploded = \array_slice($exploded, 1);
            }

            // we make sure that "current" lexicon context is given
            if (\count($exploded) === 1) {
                if ($lexicon === null) {
                    throw new \InvalidArgumentException('Invalid ref: ' . $ref);
                }

                // then given ref is just a name, for current lexicon
                $name = $exploded[0];
            } else {
                // otherwise, we have lexicon and name in ref
                [$lexicon, $name] = $exploded;
            }
        }

        // as we know what lexicon and name we are looking for, we check if it is this lexicon
        if ($this->id !== $lexicon) {
            return null;
        }

        // first shallow search, without going into nested defs
        foreach ($this->defs->toArray() as $def) {
            if ($def->name() === $name) {
                return $def;
            }
        }

        // shallow search did not find the def, so we go into nested defs
        foreach ($this->defs->toArray() as $def) {
            if (!($def instanceof DefContainer)) {
                continue;
            }

            foreach ($def->defs()->toArray() as $def) {
                if ($def->name() === $name) {
                    return $def;
                }
            }
        }

        return null;
    }
}
