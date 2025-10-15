<?php

declare(strict_types=1);

namespace Tests\Unit\Generator;

use Aazsamir\Libphpsky\Generator\Generator;
use Aazsamir\Libphpsky\Generator\Loader\LoaderInterface;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;
use Aazsamir\Libphpsky\Generator\Maker\MakerInterface;
use Aazsamir\Libphpsky\Generator\RefResolverInterface;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\Unit\TestCase;

/**
 * @internal
 */
class GeneratorTest extends TestCase
{
    private LoaderInterface&MockObject $loader;
    private MakerInterface&MockObject $maker;
    private RefResolverInterface&MockObject $refResolver;
    private Generator $generator;

    protected function setUp(): void
    {
        $this->loader = $this->createMock(LoaderInterface::class);
        $this->maker = $this->createMock(MakerInterface::class);
        $this->refResolver = $this->createMock(RefResolverInterface::class);
        $this->generator = new Generator($this->loader, $this->maker, $this->refResolver);
    }

    public function testGenerate(): void
    {
        $this->loader->expects(self::once())->method('load');
        $this->refResolver->expects(self::once())->method('resolveRefs');
        $this->maker->expects(self::once())->method('make');

        $this->generator->generate(MakeConfig::default());
    }
}
