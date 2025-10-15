<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator;

use Aazsamir\Libphpsky\Generator\Lexicon\Lexicons;
use Aazsamir\Libphpsky\Generator\Loader\FileLexiconProvider;
use Aazsamir\Libphpsky\Generator\Loader\Loader;
use Aazsamir\Libphpsky\Generator\Loader\LoaderInterface;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\Maker;
use Aazsamir\Libphpsky\Generator\Maker\MakerInterface;

/**
 * @internal
 */
final readonly class Generator
{
    public function __construct(
        private LoaderInterface $loader,
        private MakerInterface $maker,
        private RefResolverInterface $refResolver,
    ) {}

    public static function default(
        ?LoaderInterface $loader = null,
        ?MakerInterface $maker = null,
        ?RefResolverInterface $refResolver = null,
    ): self {
        return new self(
            loader: $loader ?? new Loader(
                new FileLexiconProvider(),
            ),
            maker: $maker ?? Maker::default(),
            refResolver: $refResolver ?? new RefResolver(),
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
