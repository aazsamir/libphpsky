<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Car;

use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\PhpCar\Car\CarData;

class CarVisitor
{
    /**
     * @var array<string, CarRoot>
     */
    private array $roots = [];
    /**
     * @var array<string, mixed>
     */
    private array $decoded = [];

    public function __construct(
        private readonly TypeResolver $typeResolver,
        private readonly CarData $carData,
    ) {}

    public function visitRoot(CarRoot $root, string $cid): void
    {
        $this->roots[$cid] = $root;
        $item = $this->getBlock($root->data);

        if ($item !== null && $this->isMstNode($item)) {
            $node = MstNode::fromArray($item);
            $this->decoded[$root->data] = $node;
            $this->visitMstNode($node);
        }
    }

    public function visitMstNode(MstNode $node): void
    {
        foreach ($node->entries as $entry) {
            $this->visitMstEntry($entry);
        }

        if ($node->left !== null) {
            $item = $this->getBlock($node->left);

            if ($item !== null && $this->isMstNode($item)) {
                $leftNode = MstNode::fromArray($item);
                $this->decoded[$node->left] = $leftNode;
                $this->visitMstNode($leftNode);
            }
        }
    }

    public function visitMstEntry(MstEntry $entry): void
    {
        if ($entry->tree !== null) {
            $item = $this->getBlock($entry->tree);

            if ($item !== null && $this->isMstNode($item)) {
                $node = MstNode::fromArray($item);
                $this->decoded[$entry->tree] = $node;
                $this->visitMstNode($node);
            }
        }

        $item = $this->getBlock($entry->value);

        if ($item === null) {
            return;
        }

        $this->visitMstLeaf($item, $entry->value);
    }

    /**
     * @param array<mixed> $item
     */
    public function visitMstLeaf(array $item, string $cid): void
    {
        $type = $item['$type'];
        \assert(\is_string($type));
        $type = $this->typeResolver->resolve($type);

        // we don't know this type, so we just return the raw data
        if ($type === null) {
            $decoded = $item;
        } else {
            $decoded = $type::fromArray($item);
        }

        $this->decoded[$cid] = $decoded;
    }

    /**
     * @param array<mixed> $item
     */
    private function isMstNode(array $item): bool
    {
        return
            \array_key_exists('e', $item)
            && \array_key_exists('l', $item)
            && (null === $item['l'] || \is_string($item['l']))
            && \is_array($item['e']);
    }

    /**
     * @return array<mixed>|null
     */
    private function getBlock(string $cid): ?array
    {
        if (!\array_key_exists($cid, $this->carData->blocks->items)) {
            return null;
        }

        $item = $this->carData->blocks->items[$cid]->toArray();
        \assert(\is_array($item));

        return $item;
    }

    public function getDecoded(): CarRepo
    {
        return new CarRepo(
            roots: $this->roots,
            blocks: $this->decoded,
        );
    }
}
