<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Loader\Stub;

use Aazsamir\Libphpsky\Generator\Loader\LexiconProvider;
use Aazsamir\Libphpsky\Generator\Maker\MakeConfig;

class LexiconProviderStub implements LexiconProvider
{
    public function __construct(public array $data) {}

    public function provide(MakeConfig $config): \Generator
    {
        yield [
            [
                'lexicon' => 1,
                'id' => 'test.bsky.item',
                'defs' => [
                    'main' => $this->data,
                ],
            ],
            $config->entries[0],
        ];
    }
}
