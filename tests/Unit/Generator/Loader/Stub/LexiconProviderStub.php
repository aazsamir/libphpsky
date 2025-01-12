<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Loader\Stub;

use Aazsamir\Libphpsky\ATProto\Generator\Loader\LexiconProvider;
use Generator;

class LexiconProviderStub implements LexiconProvider
{
    public function __construct(public array $data) {}

    public function provide(): Generator
    {
        yield [
            'lexicon' => 1,
            'id' => 'test.bsky.item',
            'defs' => [
                'main' => $this->data,
            ],
        ];
    }
}
