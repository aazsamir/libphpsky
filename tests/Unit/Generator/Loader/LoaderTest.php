<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Loader;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BlobDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BooleanDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\BytesDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\CidLinkDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\IntegerDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ParamsDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\PermissionSetDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ProcedureDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\QueryDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\RecordDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\RefDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\SubscriptionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\TokenDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnionDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnknownDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Lexicon\LexiconType;
use Aazsamir\Libphpsky\Generator\Loader\FileLexiconProvider;
use Aazsamir\Libphpsky\Generator\Loader\Loader;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;
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
        $loader = $this->fileloader();
        $lexicons = $loader->load($this->createMakeConfig(__DIR__ . '/res/LoaderTest/lexicon'));

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

        $lexicons = $loader->load($this->createMakeConfig());
        $lexicon = $this->getFirstLexicon($lexicons);
        /** @var BooleanDef */
        $def = $this->getFirstDef($lexicons);

        self::assertSame('main', $def->name());
        self::assertSame($lexicon, $def->lexicon());
        self::assertInstanceOf(BooleanDef::class, $def);
        self::assertEquals(LexiconType::BOOLEAN, $def->type());
        self::assertNull($def->default());
        self::assertNull($def->description());
        self::assertNull($def->const());
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

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var IntegerDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(IntegerDef::class, $def);
        self::assertEquals(LexiconType::INTEGER, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertEquals(0, $def->minimum());
        self::assertEquals(10, $def->maximum());
        self::assertEquals([1, 2, 3], $def->enum());
        self::assertEquals(1, $def->default());
        self::assertEquals(1, $def->const());
        self::assertNull($def->description());
    }

    public function testMakeStringDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'string',
            'maxLength' => 10,
            'minLength' => 1,
            'maxGraphenes' => 10,
            'minGraphenes' => 1,
            'knownValues' => ['1', '2', '3'],
            'enum' => ['1', '2', '3'],
            'default' => '1',
            'const' => '1',
        ]);

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var StringDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(StringDef::class, $def);
        self::assertEquals(LexiconType::STRING, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertEquals(10, $def->maxLength());
        self::assertEquals(1, $def->minLength());
        self::assertEquals(10, $def->maxGraphenes());
        self::assertEquals(1, $def->minGraphenes());
        self::assertEquals(['1', '2', '3'], $def->knownValues());
        self::assertEquals(['1', '2', '3'], $def->enum());
        self::assertEquals('1', $def->default());
        self::assertEquals('1', $def->const());
        self::assertNull($def->description());
    }

    public function testMakeBytesDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'bytes',
            'maxLength' => 10,
            'minLength' => 1,
        ]);

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var BytesDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(BytesDef::class, $def);
        self::assertEquals(LexiconType::BYTES, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertEquals(10, $def->maxLength());
        self::assertEquals(1, $def->minLength());
        self::assertNull($def->description());
    }

    public function testMakeCidLinkDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'cid-link',
        ]);

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var CidLinkDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(CidLinkDef::class, $def);
        self::assertEquals(LexiconType::CID_LINK, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertNull($def->description());
    }

    public function testMakeBlobDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'blob',
            'accept' => ['image/png', 'image/jpeg'],
            'maxSize' => 100,
        ]);

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var BlobDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(BlobDef::class, $def);
        self::assertEquals(LexiconType::BLOB, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertEquals(['image/png', 'image/jpeg'], $def->accept());
        self::assertEquals(100, $def->maxSize());
        self::assertNull($def->description());
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

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var ArrayDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(ArrayDef::class, $def);
        self::assertInstanceOf(BooleanDef::class, $def->items());
        self::assertEquals(1, $def->minLength());
        self::assertEquals(10, $def->maxLength());
        self::assertEquals(LexiconType::ARRAY, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertNull($def->description());
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

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var ObjectDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(ObjectDef::class, $def);
        /** @var ObjectDef $def */
        self::assertInstanceOf(StringDef::class, $def->properties()->toArray()[0]);
        self::assertEquals(['name'], $def->required());
        self::assertEquals(['name'], $def->nullable());
        self::assertEquals(LexiconType::OBJECT, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertNull($def->description());
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

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var ParamsDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(ParamsDef::class, $def);
        /** @var ObjectDef $def */
        self::assertInstanceOf(StringDef::class, $def->properties()->toArray()[0]);
        self::assertEquals(['name'], $def->required());
        self::assertEquals(LexiconType::PARAMS, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertNull($def->description());
    }

    public function testMakeTokenDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'token',
        ]);

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var TokenDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(TokenDef::class, $def);
        self::assertEquals(LexiconType::TOKEN, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertNull($def->description());
    }

    public function testMakeRefDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'ref',
            'ref' => 'main',
        ]);

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var RefDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(RefDef::class, $def);
        self::assertEquals('main', $def->ref());
        self::assertEquals(LexiconType::REF, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertNull($def->description());
    }

    public function testMakeUnionDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'union',
            'refs' => ['one', 'two'],
            'closed' => true,
        ]);

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var UnionDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(UnionDef::class, $def);
        self::assertEquals(['one', 'two'], $def->refs());
        self::assertTrue($def->closed());
        self::assertEquals(LexiconType::UNION, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertNull($def->description());
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

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var RecordDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(RecordDef::class, $def);
        self::assertInstanceOf(ObjectDef::class, $def->record());
        self::assertEquals('key', $def->key());
        self::assertEquals(LexiconType::RECORD, $def->type());
        self::assertEquals('mainRecord', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertEquals('description', $def->description());
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

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var QueryDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(QueryDef::class, $def);
        self::assertInstanceOf(StringDef::class, $def->parameters()->properties()->toArray()[0]);
        self::assertInstanceOf(RefDef::class, $def->output()->schema());
        self::assertNull($def->output()->description());
        self::assertEquals('application/json', $def->output()->encoding());
        self::assertEquals(LexiconType::QUERY, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertEquals('description', $def->description());
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

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var ProcedureDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(ProcedureDef::class, $def);
        self::assertInstanceOf(StringDef::class, $def->parameters()->properties()->toArray()[0]);
        self::assertInstanceOf(RefDef::class, $def->input()->schema());
        self::assertInstanceOf(RefDef::class, $def->output()->schema());
        self::assertEquals(LexiconType::PROCEDURE, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertEquals('description', $def->description());
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

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var SubscriptionDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(SubscriptionDef::class, $def);
        self::assertInstanceOf(UnionDef::class, $def->message()->schema());
        self::assertNull($def->message()->description());
        self::assertInstanceOf(StringDef::class, $def->parameters()->properties()->toArray()[0]);
        self::assertEquals(LexiconType::SUBSCRIPTION, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertEquals('description', $def->description());
    }

    public function testMakePermissionSetDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'permission-set',
            'title' => 'Some title',
            'detail' => 'Some detail',
            'permissions' => [
                [
                    'type' => 'permission',
                    'resource' => 'rpc',
                    'inheritAud' => true,
                    'lxm' => [
                        'app.bsky.video.uploadVideo',
                    ],
                    'action' => ['create'],
                    'collection' => [
                        'app.bsky.feed.post',
                    ],
                ],
            ],
        ]);

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var PermissionSetDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(PermissionSetDef::class, $def);
        self::assertEquals(LexiconType::PERMISSION_SET, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertEquals('Some title', $def->title());
        self::assertEquals('Some detail', $def->detail());
        self::assertCount(1, $def->permissions());
        $permission = $def->permissions()[0];
        self::assertEquals('rpc', $permission->resource());
        self::assertTrue($permission->inheritAud());
        self::assertEquals(['app.bsky.video.uploadVideo'], $permission->lxm());
        self::assertEquals(['create'], $permission->action());
        self::assertEquals(['app.bsky.feed.post'], $permission->collection());
        self::assertNull($def->description());
    }

    public function testMakeUnknownDef(): void
    {
        $loader = $this->memoryloader([
            'type' => 'unknown',
        ]);

        $lexicons = $loader->load($this->createMakeConfig());
        /** @var UnknownDef */
        $def = $this->getFirstDef($lexicons);

        self::assertInstanceOf(UnknownDef::class, $def);
        self::assertEquals(LexiconType::UNKNOWN, $def->type());
        self::assertEquals('main', $def->name());
        self::assertSame($this->getFirstLexicon($lexicons), $def->lexicon());
        self::assertNull($def->description());
    }

    private function memoryloader(array $data): Loader
    {
        return new Loader(new LexiconProviderStub($data));
    }

    private function fileloader(): Loader
    {
        return new Loader(new FileLexiconProvider());
    }

    private function createMakeConfig(?string $path = null): MakeConfig
    {
        return new MakeConfig([
            new MakeConfigEntry(
                lexiconsPath: $path ?? '',
                path: '',
                namespace: '',
                metaClient: true,
                generate: true,
            ),
        ]);
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
}
