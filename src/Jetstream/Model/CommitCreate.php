<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Jetstream\Model;

readonly class CommitCreate
{
    public function __construct(
        public string $rev,
        public Operation $operation,
        public string $collection,
        public string $rkey,
        public mixed $record,
        public ?string $cid,
    ) {}
}
