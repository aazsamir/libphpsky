<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Car;

use Aazsamir\Libphpsky\Generator\Prefab\TypeResolver;
use Aazsamir\PhpCar\Car\CarDecoder as CarCarDecoder;

class CarDeserializer
{
    private static ?self $instance = null;

    public function __construct(
        private readonly TypeResolver $typeResolver,
        private readonly CarCarDecoder $carDecoder,
    ) {}

    public static function getDefault(): self
    {
        if (self::$instance === null) {
            self::$instance = self::default();
        }

        return self::$instance;
    }

    public static function default(
        ?TypeResolver $typeResolver = null,
        ?CarCarDecoder $carDecoder = null,
    ): self {
        return new self(
            typeResolver: $typeResolver ?? TypeResolver::default(),
            carDecoder: $carDecoder ?? CarCarDecoder::new(),
        );
    }

    public function decodeString(string $car): CarRepo
    {
        $roots = [];
        $car = $this->carDecoder->decode($car);

        foreach ($car->header->roots() as $root) {
            $item = $car->blocks->items[$root]->toArray();
            \assert(\is_array($item));
            $roots[$root] = CarRoot::fromArray($item);
        }

        $visitor = new CarVisitor($this->typeResolver, $car);

        foreach ($roots as $cid => $root) {
            $visitor->visitRoot($root, $cid);
        }

        return $visitor->getDecoded();
    }
}
