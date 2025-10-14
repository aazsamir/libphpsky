<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\Defs;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\StringDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Lexicon;
use Aazsamir\Libphpsky\Generator\Maker\ClassResolver;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfigEntry;
use Aazsamir\Libphpsky\Generator\Maker\ObjectDefHandler;
use Tests\Unit\Generator\Maker\Stub\SaveClassStub;
use Tests\Unit\TestCase;

/**
 * @internal
 */
final class ObjectDefHandlerTest extends TestCase
{
    private ObjectDefHandler $objectDefHandler;
    private SaveClassStub $saveClass;
    private Lexicon $lexicon;

    protected function setUp(): void
    {
        $this->saveClass = new SaveClassStub();
        $configEntry = new MakeConfigEntry(
            lexiconsPath: '',
            path: __DIR__,
            namespace: 'Tests\Fixtures',
            metaClient: true,
            generate: true,
        );
        $classResolver = new ClassResolver();
        $this->objectDefHandler = new ObjectDefHandler(
            $classResolver,
            $this->saveClass
        );
        $this->lexicon = new Lexicon(
            lexicon: 1,
            id: 'test.lexicon',
            revision: null,
            description: null,
        );
        $this->lexicon->setConfigEntry($configEntry);
    }

    public function testMakeObjectDef(): void
    {
        $def = new ObjectDef(
            name: 'name',
            lexicon: $this->lexicon,
            properties: new Defs([
                new StringDef(
                    name: 'stringProp',
                    lexicon: $this->lexicon,
                ),
            ]),
        );

        $this->objectDefHandler->handle($def);
        $class = $this->saveClass->lastClass();

        self::assertEquals('Name', $class->getName());
        $traits = array_keys($class->getTraits());
        self::assertContains('\Aazsamir\Libphpsky\Generator\Prefab\FromArray', $traits);
        $nameconst = $class->getConstant('NAME');
        self::assertEquals('name', $nameconst->getValue());
        $idconst = $class->getConstant('ID');
        self::assertEquals('test.lexicon', $idconst->getValue());
        self::assertEquals('string', $class->getProperty('stringProp')->getType());

        $constructor = $class->getMethod('new');
        self::assertNotEmpty($constructor->getBody());
    }
}
