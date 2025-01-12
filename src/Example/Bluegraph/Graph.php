<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Example\Bluegraph;

class Graph
{
    /** @var array<string, array<string, string|int|null>> */
    private array $nodes = [];
    /** @var array<string, array{string, string}> */
    private array $edges = [];

    /**
     * @param array<string, string|int|null> $labels
     */
    public function addNode(string $node, array $labels = []): void
    {
        $this->nodes[$node] = $labels;
    }

    public function addEdge(string $to, string $from): void
    {
        $key = $to . $from;
        $this->edges[$key] = [$to, $from];
    }

    public function toDot(): string
    {
        $dot = "digraph G {\n";

        foreach ($this->nodes as $node => $labels) {
            $graphlabels = [];

            foreach ($labels as $key => $value) {
                if (\is_string($value)) {
                    $value = '"' . addslashes($value) . '"';
                }

                $graphlabels[] = "$key=$value";
            }

            $dot .= "  \"$node\" [" . implode(', ', $graphlabels) . "];\n";
        }

        foreach ($this->edges as $edge) {
            $dot .= "  \"$edge[1]\" -> \"$edge[0]\";\n";
        }

        $dot .= "}\n";

        return $dot;
    }
}
