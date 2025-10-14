<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Loader\FileLexiconProvider;
use Aazsamir\Libphpsky\Generator\Loader\Loader;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\Maker;

/**
 * @internal
 */
final class Generator
{
    public function __construct(
        private Loader $loader,
        private Maker $maker,
        private RefResolver $refResolver,
    ) {}

    public static function default(): self
    {
        return new self(
            loader: new Loader(
                new FileLexiconProvider(),
            ),
            maker: Maker::default(),
            refResolver: new RefResolver(),
        );
    }

    public function generate(MakeConfig $config): Lexicons
    {
        $lexicons = $this->loader->load($config);
        $this->refResolver->resolveRefs($lexicons);
        $this->maker->make($lexicons);

        return $lexicons;
    }
}
