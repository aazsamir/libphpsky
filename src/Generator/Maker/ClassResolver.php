<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BlobDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BooleanDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BytesDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\CidLinkDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\TokenDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnknownDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;

/**
 * @internal
 */
class ClassResolver
{
    use Unref;

    public function lexiconToNamespace(Lexicon $lexicon): string
    {
        $id = $lexicon->id();
        $id = explode('.', $id);
        $namespace = $lexicon->configEntry()->namespace;
        $namespace = rtrim($namespace, '\\');

        foreach ($id as $idElement) {
            $idElement = ucfirst($idElement);
            $namespace .= '\\' . $idElement;
        }

        return $namespace;
    }

    public function defToClassName(Def $def): string
    {
        switch (true) {
            case $def instanceof BytesDef:
            case $def instanceof CidLinkDef:
            case $def instanceof BlobDef:
            case $def instanceof TokenDef:
                return 'string';
            case $def instanceof StringDef:
                if ($def->format() === 'datetime') {
                    return '\DateTimeInterface';
                }

                return 'string';
            case $def instanceof IntegerDef:
                return 'int';
            case $def instanceof BooleanDef:
                return 'bool';
            case $def instanceof ArrayDef:
                $item = $this->unref($def->items());

                return 'array<' . $this->namespaceAndClassname($item) . '>';
            case $def instanceof UnionDef:
                $types = [];

                foreach ($def->resolvedRefs() as $type) {
                    $types[] = $this->namespaceAndClassname($type);
                }

                if (empty($types)) {
                    return 'mixed';
                }

                return implode('|', $types);
            case $def instanceof UnknownDef:
                return 'mixed';
        }

        $namespace = $this->lexiconToNamespace($def->lexicon());
        // last element of the namespace
        $last = explode('\\', $namespace);
        $last = end($last);

        $classname = ucfirst($def->name());
        $classname = match ($classname) {
            'Main' => $last,
            default => $classname,
        };

        return match ($classname) {
            'List' => 'ListDef',
            default => $classname,
        };
    }

    public function isPhpPrimitive(Def $def): bool
    {
        return
            $def instanceof BytesDef
            || $def instanceof StringDef
            || $def instanceof CidLinkDef
            || $def instanceof BlobDef
            || $def instanceof TokenDef
            || $def instanceof IntegerDef
            || $def instanceof BooleanDef
            || $def instanceof UnknownDef;
    }

    public function namespaceAndClassname(Def $def): string
    {
        $classname = $this->defToClassName($def);

        if ($this->isPhpPrimitive($def)) {
            return $classname;
        }

        $nonArrayClassname = $classname;
        $nonArrayClassname = str_replace('array<', '', $nonArrayClassname);
        $nonArrayClassname = str_replace('>', '', $nonArrayClassname);

        if (\in_array($nonArrayClassname, ['int', 'bool', 'string', 'mixed', 'array'], true)) {
            return $classname;
        }

        if ($def instanceof ArrayDef || $def instanceof UnionDef) {
            return $classname;
        }

        $namespace = $this->lexiconToNamespace($def->lexicon());

        return '\\' . $namespace . '\\' . $classname;
    }
}
