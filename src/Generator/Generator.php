<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Loader\FileLexiconProvider;
use Aazsamir\Libphpsky\Generator\Loader\Loader;
use Aazsamir\Libphpsky\Generator\Maker\ClassNameResolver;
use Aazsamir\Libphpsky\Generator\Maker\FileSaveClass;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\Maker;
use Aazsamir\Libphpsky\Generator\Maker\MetaClientGenerator;
use Aazsamir\Libphpsky\Generator\Maker\ObjectDefHandler;
use Aazsamir\Libphpsky\Generator\Maker\ProcedureDefHandler;
use Aazsamir\Libphpsky\Generator\Maker\QueryDefHandler;

/**
 * @internal
 */
final class Generator
{
    public function generate(): Lexicons
    {
        $path = __DIR__ . '/../../atproto/lexicons';
        $loader = new Loader(
            lexiconProvider: new FileLexiconProvider($path),
        );
        $lexicons = $loader->load();
        $refResolver = new RefResolver();
        $refResolver->resolveRefs($lexicons);

        $config = new MakeConfig(
            path: __DIR__ . '/../Model',
            namespace: 'Aazsamir\Libphpsky\Model',
        );

        $saver = new FileSaveClass($config);
        $classNameResolver = new ClassNameResolver(
            $config,
        );
        $queryDefHandler = new QueryDefHandler(
            $classNameResolver,
            $saver,
        );
        $procedureDefHandler = new ProcedureDefHandler(
            $classNameResolver,
            $saver,
        );
        $objectDefHandler = new ObjectDefHandler(
            $classNameResolver,
            $saver,
        );
        $metaClientGenerator = new MetaClientGenerator(
            $config,
            $saver,
            $classNameResolver,
            $queryDefHandler,
            $procedureDefHandler,
        );
        $maker = new Maker(
            $classNameResolver,
            $queryDefHandler,
            $objectDefHandler,
            $procedureDefHandler,
            $metaClientGenerator,
        );
        $maker->make($lexicons);

        return $lexicons;
    }
}
