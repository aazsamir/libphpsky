<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Loader;

use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\BlobDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\BooleanDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\BytesDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\CidLinkDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ParamsDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\RecordDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\RefDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\SubscriptionDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\TokenDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Def\UnknownDef;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\ATProto\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\ATProto\Generator\Loader\FileLexiconProvider;
use Aazsamir\Libphpsky\ATProto\Generator\Loader\LexiconProvider;
use Aazsamir\Libphpsky\ATProto\Generator\Loader\Loader;
use Tests\Unit\Generator\Loader\Stub\LexiconProviderStub;
use Tests\Unit\TestCase;

// @todo: assert invalid code paths, better check for the def output
/**
 * @internal
 */
final class LoaderTest extends TestCase
{
    public function testLexicon(): void
    {
        $loader = $this->fileloader('lexicon');
        $lexicons = $loader->load();

        self::assertCount(9, $lexicons->toArray());
        $defs = $lexicons->defs();
        $defs = iterator_to_array($defs);
        self::assertCount(1, $defs);
    }

    public function testMakeBoolean(): void
    {
        $loader = $this->memoryloader([
            'type' => 'boolean',
        ]);

        $lexicons = $loader->load();
        $lexicon = $this->getFirstLexicon($lexicons);
        $def = $this->getFirstDef($lexicons);

        self::assertSame('main', $def->name());
        self::assertSame($lexicon, $def->lexicon());
        self::assertInstanceOf(BooleanDef::class, $def);
    }

    public function testMakeInteger(): void
    {
        $loader = $this->memoryloader([
            'type' => 'integer',
            'minimum' => 0,
            'maximum' => 10,
            'enum' => ['1', '2', '3'],
            'default' => 1,
            'const' => 1,
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(IntegerDef::class, $def);
    }

    public function testMakeStringDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'string',
            'maxLength' => 10,
            'minLength' => 1,
            'maxGraphemes' => 10,
            'minGraphemes' => 1,
            'knownValues' => ['1', '2', '3'],
            'enum' => ['1', '2', '3'],
            'default' => '1',
            'const' => '1',
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(StringDef::class, $def);
    }

    public function testMakeBytesDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'bytes',
            'maxLength' => 10,
            'minLength' => 1,
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(BytesDef::class, $def);
    }

    public function testMakeCidLinkDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'cid-link',
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(CidLinkDef::class, $def);
    }

    public function testMakeBlobDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'blob',
            'accept' => ['image/png', 'image/jpeg'],
            'maxSize' => 100,
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(BlobDef::class, $def);
    }

    public function testMakeArrayDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'array',
            'items' => [
                'type' => 'boolean',
            ],
            'minLength' => 1,
            'maxLength' => 10,
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(ArrayDef::class, $def);
        /** @var ArrayDef $def */
        self::assertInstanceOf(BooleanDef::class, $def->items());
    }

    public function testMakeObjectDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'object',
            'properties' => [
                'name' => [
                    'type' => 'string',
                ],
            ],
            'required' => ['name'],
            'nullable' => ['name'],
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(ObjectDef::class, $def);
        /** @var ObjectDef $def */
        self::assertInstanceOf(StringDef::class, $def->properties()->toArray()[0]);
    }

    public function testMakeParamsDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'params',
            'properties' => [
                'name' => [
                    'type' => 'string',
                ],
            ],
            'required' => ['name'],
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(ParamsDef::class, $def);
        /** @var ObjectDef $def */
        self::assertInstanceOf(StringDef::class, $def->properties()->toArray()[0]);
    }

    public function testMakeTokenDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'token',
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(TokenDef::class, $def);
    }

    public function testMakeRefDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'ref',
            'ref' => 'main',
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(RefDef::class, $def);
    }

    public function testMakeUnionDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'union',
            'refs' => ['one', 'two'],
            'closed' => true,
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(UnionDef::class, $def);
    }

    public function testMakeRecordDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'record',
            'key' => 'key',
            'record' => [
                'type' => 'object',
                'properties' => [
                    'name' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'description' => 'description',
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(RecordDef::class, $def);
        /** @var RecordDef $def */
        self::assertInstanceOf(ObjectDef::class, $def->record());
    }

    public function testMakeQueryDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'query',
            'description' => 'description',
            'parameters' => [
                'type' => 'params',
                'properties' => [
                    'name' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'output' => [
                'encoding' => 'application/json',
                'schema' => [
                    'type' => 'ref',
                    'ref' => 'something',
                ],
            ],
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(QueryDef::class, $def);
        /** @var QueryDef $def */
        self::assertInstanceOf(StringDef::class, $def->parameters()->properties()->toArray()[0]);
        self::assertInstanceOf(RefDef::class, $def->output()->schema());
    }

    public function testMakeProcedureDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'procedure',
            'description' => 'description',
            'parameters' => [
                'type' => 'params',
                'properties' => [
                    'name' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'input' => [
                'encoding' => 'application/json',
                'schema' => [
                    'type' => 'ref',
                    'ref' => 'something',
                ],
            ],
            'output' => [
                'encoding' => 'application/json',
                'schema' => [
                    'type' => 'ref',
                    'ref' => 'something',
                ],
            ],
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(ProcedureDef::class, $def);
        /** @var ProcedureDef $def */
        self::assertInstanceOf(StringDef::class, $def->parameters()->properties()->toArray()[0]);
        self::assertInstanceOf(RefDef::class, $def->input()->schema());
        self::assertInstanceOf(RefDef::class, $def->output()->schema());
    }

    public function testMakeSubscriptionDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'subscription',
            'message' => [
                'schema' => [
                    'type' => 'union',
                    'refs' => ['one', 'two'],
                ],
            ],
            'description' => 'description',
            'parameters' => [
                'type' => 'params',
                'properties' => [
                    'name' => [
                        'type' => 'string',
                    ],
                ],
            ],
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(SubscriptionDef::class, $def);
        /** @var SubscriptionDef $def */
        self::assertInstanceOf(UnionDef::class, $def->message()->schema());
        self::assertInstanceOf(StringDef::class, $def->parameters()->properties()->toArray()[0]);
    }

    public function testMakeUnknownDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'unknown',
        ]);

        $lexicons = $loader->load();
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(UnknownDef::class, $def);
    }

    private function memoryloader(array $data): Loader
    {
        return new Loader(new LexiconProviderStub($data));
    }

    private function fileloader(string $dirname): Loader
    {
        return new Loader($this->provider($dirname));
    }

    private function getFirstLexicon(Lexicons $lexicons): Lexicon
    {
        $lexicons = $lexicons->toArray();

        return $lexicons[0];
    }

    private function getFirstDef(Lexicons $lexicons): Def
    {
        $defs = $lexicons->defs();
        $defs = iterator_to_array($defs);

        return $defs[0];
    }

    private function provider(string $dirname): LexiconProvider
    {
        return new FileLexiconProvider(
            __DIR__ . '/res/LoaderTest/' . $dirname
        );
    }
}
