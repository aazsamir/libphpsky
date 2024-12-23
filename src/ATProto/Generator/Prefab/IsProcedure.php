<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Prefab;

trait IsProcedure
{
    use IsAction;

    /**
     * @param array<string, mixed> $args
     */
    public function request(?array $args): mixed
    {
        return $this->performRequest($args, 'procedure', 'POST');
    }

    /**
     * @param mixed[] $args
     *
     * @return array<string, mixed>
     */
    private function argsWithKeys(array $args): array
    {
        return $this->getArgsWithKeys($args, 'procedure');
    }
}
