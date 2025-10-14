<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BlobDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BooleanDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BytesDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\CidLinkDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\TokenDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnknownDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Maker\ClassResolver;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class ClassResolverTest extends TestCase
{
    private ClassResolver $resolver;
    private Lexicon $lexicon;

    protected function setUp(): void
    {
        $configEntry = new MakeConfigEntry(
            lexiconsPath: '',
            path: '',
            namespace: 'Tests\Fixtures',
            metaClient: true,
            generate: true,
        );
        $this->resolver = new ClassResolver();
        $this->lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.id.something',
            revision: null,
            description: null,
        );
        $this->lexicon->setConfigEntry($configEntry);
    }

    public function testLexiconToNamespace(): void
    {
        $namespace = $this->resolver->lexiconToNamespace($this->lexicon);

        self::assertEquals('Tests\Fixtures\Test\Id\Something', $namespace);
    }

    public function testDefToClassNameBytes(): void
    {
        $def = new BytesDef(
            name: 'name',
            lexicon: $this->lexicon,
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('string', $name);
    }

    public function testDefToClassNameCidLink(): void
    {
        $def = new CidLinkDef(
            name: 'name',
            lexicon: $this->lexicon,
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('string', $name);
    }

    public function testDefToClassNameBlob(): void
    {
        $def = new BlobDef(
            name: 'name',
            lexicon: $this->lexicon,
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('string', $name);
    }

    public function testDefToClassNameToken(): void
    {
        $def = new TokenDef(
            name: 'name',
            lexicon: $this->lexicon,
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('string', $name);
    }

    public function testDefToClassNameString(): void
    {
        $def = new StringDef(
            name: 'name',
            lexicon: $this->lexicon,
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('string', $name);
    }

    public function testDefToClassNameDatetime(): void
    {
        $def = new StringDef(
            name: 'name',
            lexicon: $this->lexicon,
            format: 'datetime',
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('\DateTimeInterface', $name);
    }

    public function testDefToClassNameInt(): void
    {
        $def = new IntegerDef(
            name: 'name',
            lexicon: $this->lexicon,
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('int', $name);
    }

    public function testDefToClassNameBoolean(): void
    {
        $def = new BooleanDef(
            name: 'name',
            lexicon: $this->lexicon,
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('bool', $name);
    }

    public function testDefToClassNameArray(): void
    {
        $def = new ArrayDef(
            name: 'name',
            lexicon: $this->lexicon,
            items: new IntegerDef(
                name: 'name',
                lexicon: $this->lexicon,
            ),
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('array<int>', $name);
    }

    public function testDefToClassNameUnion(): void
    {
        $def = new UnionDef(
            name: 'name',
            lexicon: $this->lexicon,
            refs: [],
        );
        $def->setResolvedRefs([
            new IntegerDef(
                name: 'name',
                lexicon: $this->lexicon,
            ),
            new StringDef(
                name: 'name',
                lexicon: $this->lexicon,
            ),
        ]);

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('int|string', $name);
    }

    public function testDefToClassNameEmpty(): void
    {
        $def = new UnionDef(
            name: 'name',
            lexicon: $this->lexicon,
            refs: [],
        );
        $def->setResolvedRefs([]);

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('mixed', $name);
    }

    public function testDefToClassNameUnknown(): void
    {
        $def = new UnknownDef(
            name: 'name',
            lexicon: $this->lexicon,
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('mixed', $name);
    }

    public function testDefToClassNameQuery(): void
    {
        $def = new QueryDef(
            name: 'name',
            lexicon: $this->lexicon,
        );

        $name = $this->resolver->defToClassName($def);

        self::assertEquals('Name', $name);
    }

    public function testNamespaceAndClassnamePrimitive(): void
    {
        $def = new ArrayDef(
            name: 'name',
            lexicon: $this->lexicon,
            items: new IntegerDef(
                name: 'name',
                lexicon: $this->lexicon,
            ),
        );

        $name = $this->resolver->namespaceAndClassname($def);

        self::assertEquals('array<int>', $name);
    }

    public function testNamespaceAndClassnameObject(): void
    {
        $def = new ArrayDef(
            name: 'name',
            lexicon: $this->lexicon,
            items: new ObjectDef(
                name: 'name',
                lexicon: $this->lexicon,
                properties: new Defs([]),
            ),
        );

        $name = $this->resolver->namespaceAndClassname($def);

        self::assertEquals('array<\Tests\Fixtures\Test\Id\Something\Name>', $name);
    }
}
